<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{

// login_id
    public static function id()
    {
        return 1;

    }

// login_user
    public static function is_logged_in()
    {
        return true;
    }
    // logout
    public static function logout()
    { 
        return true;
    }

    public static function currentUser()
    {
       return  \DB::table('accounts')->where('ID', self::id())->first();
    }
    // super admin
    public static function is_super_admin()
    {
        return self::currentUser()->user_type == 'super_admin' ? true : false;

    }

    public static function is_enabled($key)
    {
        return self::currentUser()->$key == 'yes' ? true : false ;
    }

   

}
