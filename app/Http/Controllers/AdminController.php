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

    

}
