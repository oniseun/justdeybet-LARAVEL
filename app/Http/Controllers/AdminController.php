<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Activities;
use App\Site;

class AdminController extends Controller
{
    public function addAdminForm()
    {
        return view('admin.dialogs.addAdmin');
    }

    public function confirmReactivationForm($id)
    {

        $adminInfo = Admin::info($id);

        return view('admin.confirmAction.reactivateAdmin', compact('adminInfo'));
    }

    public function confirmSuspensionForm($id)
    {

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

    



    

}
