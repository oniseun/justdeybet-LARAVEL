<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Activities;

class AuthController extends Controller
{
    public function logoutForm()
    {
        return view('admin.confirmAction.logout');
    }

    public function adminLoginForm()
    {
        if(!Auth::check())
        {
            return view('public.adminLogin');
        }
        else {
            return redirect('/admin/dashboard')->with('success', "Welcome back !!");
        }
        
    }

    public function login()
    {
        if (!\Request::has(Auth::$loginFormFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if(Auth::login_user())
        {
            $email = \Request::input('email');
            Activities::update_account_log(Auth::getInfoByEmail($email), 'logged_in', 'logged into the system');
            $redirect_url = \Request::has('redirect_url') ? \Request::input('redirect_url') : '/admin/dashboard';

            return redirect($redirect_url)->with('success', "Welcome to justdeybet Admin!!");
        }
        else {
            return back()->with('failure', "Email or password Incorrect!!");
        }
    }

    public function logout()
    {
        Activities::update_account_log(Auth::currentUser(), 'logged_out', 'logged out of the system');
        Auth::logout_user();
        return redirect('/home')->with('success', "You have successfully Logged Out!!");
    }
}
