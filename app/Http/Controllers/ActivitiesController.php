<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activities;
use App\Site;
use App\Auth;

class ActivitiesController extends Controller
{
    public function nextSiteActivities($timestamp)
    {
        if(Auth::is_super_admin())
        {
            $activityList = Activities::next_site_activities($timestamp);
        }
        else {
            $activityList = Activities::admin_next_site_activities(Auth::id(), $timestamp);
        }
        
        $siteInfo = Site::info();

        return view('admin.list.nextSiteActivities', compact('activityList','siteInfo'));
    }

    public function manageList()
    {

        if (Auth::is_super_admin()) {
            $activityList = Activities::all_site_activities();
        } 
        else {
            $activityList = Activities::admin_site_activities(Auth::id());
        }
        
        $siteInfo = Site::info();

        return view('admin.list.siteActivities', compact('activityList','siteInfo'));
    }
}
