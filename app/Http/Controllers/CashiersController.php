<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cashiers;
use App\Site;
use App\Auth;
use App\Activities;

class CashiersController extends Controller
{
    public function addCashierForm()
    {
        if (!Auth::is_super_admin()) {
            return view('admin.404');
            exit;
        }

        return view('admin.dialogs.addCashier');
    }

    public function confirmReactivationForm($id)
    {
        if (!Auth::is_super_admin() || !$this->cashierExist($id)) {
            return view('admin.404');
            exit;
        }

        $cashierInfo = Cashiers::info($id);

        return view('admin.confirmAction.reactivateCashier', compact('cashierInfo'));
    }

    public function confirmSuspensionForm($id)
    {
        if (!Auth::is_super_admin() || !$this->cashierExist($id)) {
            return view('admin.404');
            exit;
        }

        $cashierInfo = Cashiers::info($id);

        return view('admin.confirmAction.suspendCashier', compact('cashierInfo'));
    }

    public function manageList()
    {

        $siteInfo = Site::info();
        $cashierList = Cashiers::_list();

        return view('admin.list.manageCashiers', compact('siteInfo', 'cashierList'));
    }

    public function suspendedList()
    {

        $siteInfo = Site::info();
        $cashierList = Cashiers::suspended();

        return view('admin.list.suspendedCashiers', compact('siteInfo', 'cashierList'));
    }

    public function addCashier()
    {

        if (!Auth::is_super_admin()) {
            echo ajax_alert('warning', 'YOu are not authorized');
            exit;
        }

        if (!\Request::has(Cashiers::$addCashierFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Cashiers::add()) {
            $input = \Request::only(Cashiers::$addCashierFillable);
            Activities::update_account_log(Auth::currentUser(), 'cashier_add', "Added {$input['display_name']} to Cashier list");
            echo ajax_alert('success', "Successfully added cashier");
        } else {
            echo ajax_alert('warning', 'Sorry an error occured, check your input');
        }
    }

    public function suspendCashier()
    {
        if (!Auth::is_super_admin()) {
            return back()->with('failure', 'You are not authorized');
            exit;
        }

        if (!\Request::has(Cashiers::$suspendReactivateCashierFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (!$this->cashierExist(\Request::only(Cashiers::$suspendReactivateCashierFillable)['cashier_id'])) {
            return back()->with('failure', 'Cashier does not exist');
            exit;
        }

        if (Cashiers::suspend()) {
            $input = \Request::only(Cashiers::$suspendReactivateCashierFillable);
            $cashierInfo = Cashiers::info($input['cashier_id']);
            $mainMSG = "Successfully suspended {$cashierInfo->display_name} ";
            Activities::update_account_log(Auth::currentUser(), 'cashier_suspension', $mainMSG);
            return redirect('/admin/cashiers/suspended')->with('success', $mainMSG);

        } else {
            return back()->with('failure', 'Sorry an error occured, Please try again');
        }
    }

    public function reactivateCashier()
    {
        if (!Auth::is_super_admin()) {
            return back()->with('failure', 'You are not authorized');
            exit;
        }

        if (!\Request::has(Cashiers::$suspendReactivateCashierFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (!$this->cashierExist(\Request::only(Cashiers::$suspendReactivateCashierFillable)['cashier_id'])) {
            return back()->with('failure', 'Cashier does not exist');
            exit;
        }

        if (Cashiers::reactivate()) {
            $input = \Request::only(Cashiers::$suspendReactivateCashierFillable);
            $cashierInfo = Cashiers::info($input['cashier_id']);
            $mainMSG = "Successfully reactivated {$cashierInfo->display_name} ";
            Activities::update_account_log(Auth::currentUser(), 'cashier_reactivation', $mainMSG);
            return redirect('/admin/cashiers/list')->with('success', $mainMSG);

        } else {
            return back()->with('failure', 'Sorry an error occured, Please try again');
        }
    }

    private function cashierExist($cashierID)
    {
        return \DB::table('accounts')->where('ID', $cashierID)->where('user_type', 'cashier')->exists();
    }

}
