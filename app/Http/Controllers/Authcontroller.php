<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class Authcontroller extends Controller
{
    //
    public function showLoginView(Request $request)
    {
        $request->request->add(['guard' => $request->guard]);
        $validator = validator($request->all(), [

            'guard' => 'required|string|in:admin,user'
        ]);
        $request->session()->put('guard', $request->input('guard'));
        if (!$validator->fails()) {
            return response()->view('cms.auth.login');
        } else {
            abort(Response::HTTP_NOT_FOUND, 'The page you have requseted is not found');
        }
    }
    public function login(Request $request)
    {
        $validator = validator([
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean'
        ]);
        $guard = session()->get('guard');

        if (!$validator->fails()) {
            $crednrtials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];
            if (Auth::guard($guard)->attempt($crednrtials, $request->input('remember'))) {
                return response()->json(['message' => 'login success'], Response::HTTP_OK);
            } else {
                return response()->json(
                    ['message' => 'Login failed, check login details'],
                    Response::HTTP_BAD_REQUEST
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function logout(Request $request)
    {
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login', $guard);
    }

    public function editPassword(Request $request)
    {
        return response()->view('cms.auth.edit-password');
    }


    public function updatePassword(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'user';
        $validator = validator($request->all(), [
            'password' => 'required|current_password:' . $guard,
            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()->numbers()]
        ]);
        if (!$validator->fails()) {
            $user = $request->user();
            $user->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? 'Password changed successfully' : 'Password was not changed successfully'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
