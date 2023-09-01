<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailVeificationcontroller extends Controller
{
    //
    public function showEmailverification()
    {
        return response()->view('cms.auth.verify-email');
    }

    public function sendVerificationEmail(Request $request)
    {
        if (!$request->user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();
            return response()->json(['message' => 'Verification email sent successfully'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Email has been verified!'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function verfyEmail(EmailVerificationRequest $emailVerificationRequest)
    {
        $emailVerificationRequest->fulfill();
        return redirect()->route('cms.dashpard');
    }
}
