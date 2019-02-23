<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static $addAdminFillable = [
        'gender', 'username', 'email', 'about', 'display_name',
        'can_create_tickets', 'can_add_games', 'can_update_scores', 'can_remove_games', 'can_play_games'
    ],




    $suspendReactivateAdminFillable = ['admin_id'] ;

    public static function check_count($query, $var)
    {
        \DB::select(sprintf($query, $var))['count'] > 0 ? true : false;
    }


  
    public static function add()
    {
        $data = \Request::only(self::$addAdminFillable);
        $defaultPassword = 'password';

        $data['date_registered'] = now();
        $data['last_activity']  = now();
        $data['password'] = bcrypt($defaultPassword);
        $data['access_token'] = bcrypt($data['email'] . rand(419, 200) . uniqid() . microtime());

        $data['user_type'] = 'admin';


        return \DB::table('accounts')->insert($data);
    }

    

    public static function suspend()
    {
        $data = \Request::only(self::$suspendReactivateAdminFillable);

        return \DB::table('accounts')->where('user_type', 'admin')->where('ID', $data['admin_id'])->update(['suspended' => 'yes']);
    }

    public static function reactivate()
    {
        $data = \Request::only(self::$suspendReactivateAdminFillable);

        return \DB::table('accounts')
                ->where('user_type', 'admin')
                ->where('ID', $data['admin_id'])
                ->where('suspended','yes')->update(['suspended' => 'no']);
    }

    public static function info($ID)
    {
        return \DB::table('accounts')->where('ID',$ID)->first();

    }



    // admin list
    public static function _list( $limit = 15)
    {
     
        return \DB::table('accounts')->where('user_type', 'admin')->orderBy('date_registered','DESC')->limit($limit)->get();

    }

    public static function suspended_admin_list( $limit = 15)
    {

        return \DB::table('accounts')->where('user_type', 'admin')->where('suspended', 'yes')->orderBy('date_registered', 'DESC')->limit($limit)->get();

    }



  


    # [ site info ]
   

}
