<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
   
// site info
 public static function all_site_activities($limit = 15)
    {
     
         return \DB::table('admin_logs')->orderBy('action_date','DESC')->limit($limit)->get();

    }

    public static function admin_site_activities($adminID,$limit = 15)
    {

        return \DB::table('admin_logs')->where('action_user_id',$adminID)->orderBy('action_date', 'DESC')->limit($limit)->get();

    }

    public static function next_site_activities($from_time, $limit = 15)
    {
        return \DB::table('admin_logs')
                ->whereRaw("UNIX_TIMESTAMP(action_date) < $from_time")
                ->orderBy('action_date', 'DESC')->limit($limit)->get();

    }

    public static function admin_next_site_activities($adminID,$from_time, $limit = 15)
    {
        return \DB::table('admin_logs')
            ->whereRaw("UNIX_TIMESTAMP(action_date) < $from_time")
            ->where('action_user_id',$adminID)
            ->orderBy('action_date', 'DESC')->limit($limit)->get();

    }
// update activity time
    public static function update_activity($adminID)
    {

        \DB::statement(" UPDATE accounts SET last_activity = NOW() WHERE ID = $adminID ");

    }
//update
    public static function update_account_log($adminInfo,$action_type, $comment)
    {
        return \DB::table('admin_logs')->insert(
    //set
            [
                'action_user_id' => $adminInfo->ID,
                'username' => $adminInfo->user_type . ' : ' . $adminInfo->display_name,
                'action_type' => $action_type,
                'comment' => $comment,
                'ip' => \Request::ip(),
                'UA' => \Request::header('User-Agent') 
            ]
            
        );

        self::update_activity($adminInfo->ID);
    }
}
