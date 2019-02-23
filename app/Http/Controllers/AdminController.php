<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Activities;
use App\Site;
use App\Auth;

class AdminController extends Controller
{
    public function addAdminForm()
    {
        if (!Auth::is_super_admin() ) {
            return view('admin.404');
            exit;
        }

        return view('admin.dialogs.addAdmin');
    }

    public function confirmReactivationForm($id)
    {
        if (!Auth::is_super_admin() || !$this->adminExist($id)) {
            return view('admin.404');
            exit;
        }

        $adminInfo = Admin::info($id);

        return view('admin.confirmAction.reactivateAdmin', compact('adminInfo'));
    }

    public function confirmSuspensionForm($id)
    {
        if (!Auth::is_super_admin() || !$this->adminExist($id)) {
            return view('admin.404');
            exit;
        }

        $adminInfo = Admin::info($id);

        return view('admin.confirmAction.suspendAdmin', compact('adminInfo'));
    }


    public function manageList()
    {

        $siteInfo = Site::info();
        $adminList = Admin::_list();

        return view('admin.list.manageAdmins',compact('siteInfo','adminList'));
    }
   

    public function suspendedList()
    {

        $siteInfo = Site::info();
        $adminList = Admin::suspended_admin_list();

        return view('admin.list.suspendedAdmins', compact('siteInfo', 'adminList'));
    }

    public function addAdmin()
    {
        if (!Auth::is_super_admin()) {
            echo ajax_alert('warning', 'YOu are not authorized');
            exit;
        }

        if (!\Request::has(Admin::$addAdminFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (Admin::add()){
            $input = \Request::only(Admin::$addAdminFillable);
            Activities::update_account_log(Auth::currentUser(), 'admin_add', "Added {$input['display_name']} to admin list");
            echo ajax_alert('success', "Successfully added admin");
        } else {
            echo ajax_alert('warning', 'Sorry an error occured, check your input');
        }
    }

    public function suspendAdmin()
    {
        if (!Auth::is_super_admin()) {
            return back()->with('failure', 'YOu are not authorized');
            exit;
        }

        if (!\Request::has(Admin::$suspendReactivateAdminFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }
        if (!$this->adminExist(\Request::only(Admin::$suspendReactivateAdminFillable)['admin_id'])) {
            return back()->with('failure', 'Admin does not exist');
            exit;
        }

        if (Admin::suspend()) {
            $input = \Request::only(Admin::$suspendReactivateAdminFillable);
            $adminInfo = Admin::info($input['admin_id']);
            $mainMSG = "Successfully suspended {$adminInfo->display_name} ";
            Activities::update_account_log(Auth::currentUser(), 'admin_suspension', $mainMSG);
            return redirect('/admin/suspended')->with('success', $mainMSG);

        } else {
            return back()->with('failure', 'Sorry an error occured, Please try again');
        }
    }

    public function reactivateAdmin()
    {
        if (!Auth::is_super_admin()) {
            return back()->with('failure', 'YOu are not authorized');
            exit;
        }

        if (!\Request::has(Admin::$suspendReactivateAdminFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if(!$this->adminExist(\Request::only(Admin::$suspendReactivateAdminFillable)['admin_id']))
        {
            return back()->with('failure', 'Admin does not exist');
            exit;
        }

        if (Admin::reactivate()) {
            $input = \Request::only(Admin::$suspendReactivateAdminFillable);
            $adminInfo = Admin::info($input['admin_id']);
            $mainMSG = "Successfully reactivated {$adminInfo->display_name} ";
            Activities::update_account_log(Auth::currentUser(), 'admin_reactivation', $mainMSG);
            return redirect('/admin/list')->with('success', $mainMSG);

        } else {
            return back()->with('failure', 'Sorry an error occured, Please try again');
        }
    }

    private function adminExist($adminID)
    {
        return \DB::table('accounts')->where('ID', $adminID)->where('user_type','admin')->exists();
    }
    



    

}
