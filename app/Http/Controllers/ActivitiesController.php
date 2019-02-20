<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activities;
use App\Site;

class ActivitiesController extends Controller
{
    public function nextSiteActivities($timestamp)
    {

        $activityList = Activities::next_site_activities($timestamp);
        $siteInfo = Site::info();

        return view('admin.list.nextSiteActivities', compact('activityList','siteInfo'));
    }

    public function manageList()
    {

        $activityList = Activities::all_site_activities();
        $siteInfo = Site::info();

        return view('admin.list.siteActivities', compact('activityList','siteInfo'));
    }
}
