<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Profile;
use App\Activities;

class ProfileController extends Controller
{
    public function updatePasswordForm()
    {
        return view('admin.forms.changePassword');
    }

    public function updateInfoForm()
    {
        $userInfo = Auth::currentUser();  
        return view('admin.forms.changeInfo',compact('userInfo')) ;
    }

    public function updatePassword()
    {
        if (!\Request::has(Profile::$updatePasswordFillable)) {
            echo ajax_alert('warning',  "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Profile::update_password(Auth::id())) {
            Activities::update_account_log(Auth::currentUser(), 'password_update', 'Successfully changed own password ');
            echo ajax_alert('success', "Successfully changed password!! ");

        } else {
            echo ajax_alert('warning', 'Sorry an error occured, Please check form fields and try again');
        }
    }

    public function updateInfo()
    {   
         if (!\Request::has(Profile::$updateInfoFillable)) {
            echo ajax_alert('warning',  "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Profile::update_info(Auth::id())) {
            Activities::update_account_log(Auth::currentUser(), 'profile_update', 'Updated own profile ');
            echo ajax_alert('success', "Successfully updated profile ");



        } else {
            echo ajax_alert('warning', 'Sorry an error occured, Please check form fields and try again');
        }
    }



    
}
