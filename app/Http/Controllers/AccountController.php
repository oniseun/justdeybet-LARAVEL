<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Auth;
Use App\Activities;

class AccountController extends Controller
{

    public function __construct()
    {
        if(\Request::method() == 'post' && !Auth::is_super_admin())
        {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }
        
        if(\Request::method() == 'get' && !Auth::is_super_admin())
        {
            return view('admin.404');
            exit;
        }
    }
    public function infoUpdateForm($accountID)
    {
        if (!$this->accountExist($accountID) || $this->isSuperAdmin($accountID)) {
            return view('admin.404');
            exit;
        }

        $accountInfo = Account::info($accountID);
        return view('admin.dialogs.changeAccountInfo',compact('accountInfo'));
    }

    public function passwordUpdateForm($accountID)
    {
        if (!$this->accountExist($accountID) || $this->isSuperAdmin($accountID)) {
            return view('admin.404');
            exit;
        }

        $accountInfo = Account::info($accountID);
        return view('admin.dialogs.changeAccountPassword', compact('accountInfo'));
    }

    public function permissionUpdateForm($accountID)
    {
        if (!$this->accountExist($accountID) || $this->isSuperAdmin($accountID)) {
            return view('admin.404');
            exit;
        }

        $accountInfo = Account::info($accountID);
        return view('admin.dialogs.changeAccountPermission', compact('accountInfo'));
    }

    public function updateInfo()
    {
        if (!\Request::has(Account::$updateInfoFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Account::update_info()) {
            $input = \Request::only(Account::$updateInfoFillable);
            $accountInfo = Account::info($input['account_id']);
            Activities::update_account_log(Auth::currentUser(), 'account_info_update', "Updated Info for : {$accountInfo->display_name}  ");
            echo ajax_alert('success', "Info Updated for : {$accountInfo->display_name}  ");



        } else {
            echo ajax_alert('warning', 'Sorry an error occured, Please check form fields and try again');
        }
    }

    public function updatePermission()
    {
        if (!\Request::has(Account::$updatePermissionFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Account::update_permission()) {
            $input = \Request::only(Account::$updatePermissionFillable);
            $accountInfo = Account::info($input['account_id']);
            Activities::update_account_log(Auth::currentUser(), 'account_permission_update', "Updated Permission for : {$accountInfo->display_name}  ");
            echo ajax_alert('success', "Permission Updated for : {$accountInfo->display_name}  ");



        } else {
            echo ajax_alert('warning', 'Sorry an error occured, Please check form fields and try again');
        }
    }

    public function updatePassword()
    {
        if (!\Request::has(Account::$updatePasswordFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Account::update_password()) {
            $input = \Request::only(Account::$updatePasswordFillable);
            $accountInfo = Account::info($input['account_id']);
            Activities::update_account_log(Auth::currentUser(), 'account_password_update', "Updated Password for : {$accountInfo->display_name}  ");
            echo ajax_alert('success', "Password Updated for : {$accountInfo->display_name}  ");



        } else {
            echo ajax_alert('warning', 'Sorry an error occured, Please check form fields and try again');
        }
    }

    private function  isSuperAdmin($accountID)
    {
        return Account::info($accountID)->user_type == 'super_admin' ? true : false;
    }

    private function accountExist($accountID)
    {
        return \DB::table('accounts')->where('ID',$accountID)->exists() ;
    }

}
