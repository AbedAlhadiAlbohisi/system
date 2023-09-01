<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifications;

class NotificationController extends Controller
{



    //
    public function index(Request $request)
    {

        $request->user()->notifications->markAsRead();
        $notifications = $request->user()->notifications;
        return response()->view('cms.notifications.index', ['notifications' => $notifications]);
    }
}
