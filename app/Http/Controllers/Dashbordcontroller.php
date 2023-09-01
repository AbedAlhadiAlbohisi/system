<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Note;
use App\Models\Sick;
use App\Models\User;
use Illuminate\Http\Request;

class Dashbordcontroller extends Controller
{
    public function showDashbord()
    {
        $userCount = User::count();
        $admincount = Admin::count();
        $Sikecount = Sick::count();
        $Notecount = Note::count();


        return response()->view('cms.dashpard', [
            'userCount' => $userCount,
            'admincount' => $admincount,
            'Sikecount' => $Sikecount,
            'Notecount' => $Notecount,

        ]);
    }
}
