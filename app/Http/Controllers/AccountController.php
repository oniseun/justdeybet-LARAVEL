<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    public function infoUpdateForm($accountID)
    {
        $accountInfo = Account::info($accountID);
        return view('admin.dialogs.changeAccountInfo',compact('accountInfo'));
    }

    public function passwordUpdateForm($accountID)
    {
        $accountInfo = Account::info($accountID);
        return view('admin.dialogs.changeAccountPassword', compact('accountInfo'));
    }

    public function permissionUpdateForm($accountID)
    {
        $accountInfo = Account::info($accountID);
        return view('admin.dialogs.changeAccountPermission', compact('accountInfo'));
    }

}
