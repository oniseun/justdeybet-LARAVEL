<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cashiers;
use App\Site;
use App\Auth;

class CashiersController extends Controller
{
    public function addCashierForm()
    {
        return view('admin.dialogs.addCashier');
    }

    public function manageList()
    {

        $siteInfo = Site::info();
        $cashierList = Cashiers::_list();

        return view('admin.list.manageCashiers', compact('siteInfo', 'cashierList'));
    }

    public function reactivateCashier($id)
    {

        $cashierInfo = Cashiers::info($id);

        return view('admin.confirmAction.reactivateCashier', compact('cashierInfo'));
    }

    public function suspendCashier($id)
    {

        $cashierInfo = Cashiers::info($id);

        return view('admin.confirmAction.suspendcashier', compact('cashierInfo'));
    }

    public function suspendedList()
    {

        $siteInfo = Site::info();
        $cashierList = Cashiers::suspended();

        return view('admin.list.suspendedCashiers', compact('siteInfo', 'cashierList'));
    }   

    

}