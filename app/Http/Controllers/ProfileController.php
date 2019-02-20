<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Auth;

class ProfileController extends Controller
{
    public function changePasswordForm()
    {
        return view('admin.forms.changePassword');
    }

    public function changeInfoForm()
    {
        $adminInfo = Admin::info(Auth::id())  ;
        return view('admin.forms.changeInfo',compact('adminInfo')) ;
    }

    public function logoutForm()
    {
        return view('admin.confirmAction.logout');
    }



    
}
