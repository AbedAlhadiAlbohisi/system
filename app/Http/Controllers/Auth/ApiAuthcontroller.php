<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Exception;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Token;
use phpseclib3\Crypt\Hash;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthcontroller extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {

            $user = User::where('email', '=', $request->input('email'))->first();
            if (FacadesHash::check($request->input('password'), $user->password)) {
                $token = $user->createToken('User-API');
                $user->setAttribute('token', $token->accessToken);
                // $user = $user->load('city'); //لارجاع بيانات ال city
                return response()->json(
                    [
                        'message' => 'Loggen in successfully',
                        'data' => $user,
                    ],
                    Response::HTTP_OK,
                );
            } else {
                return response()->json(
                    ['message' => 'Login Filed, error password'],
                    Response::HTTP_BAD_REQUEST,
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    public function loginPGTC(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            return  $this->genaratePGCt($request);
        } else {
            return response()->json(
                ['message' => 'Login Filed, error password'],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    
    private function genaratePGCt(Request $request)
    {
        try {

            $response = Http::asForm()->post('http://127.0.0.1.8000/oauth/token', [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'spijR6zBaufMC5NWzvBHsk8j0vwb1nK7mkMFzojd',
                'username' => $request->input('email'),
                'password' => $request->input('password'),
                'scope' => '*'
            ]);
            $decodedResponse = json_decode($response);
            $user = User::where('email', '=', $request->input('email'))->first();
            $user->setAttribute('token', $decodedResponse->access_token);
            return response()->json([
                'status' => true,
                'message' => 'Logged in successfully',
                'data' => $user,
            ], Response::HTTP_OK);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => json_decode($response)->message,
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function logout(Request $request)
    {
        $token = $request->user('user-api')->token();
        $revoked = $token->revoke();
        return response()->json(
            [
                'message' => $revoked ? 'Logged out successfully' : 'Logout failed',
            ],
            $revoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
