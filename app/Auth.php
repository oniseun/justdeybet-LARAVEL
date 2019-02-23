<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    public static $loginFormFillable = ['email','password'];
// login_id

    public static function check()
    {

        if (\Request::session()->has('bet_admin_id') && \Request::session()->has('bet_access_token')) {

            $db_check = \DB::table('accounts')->where('ID', session('bet_admin_id'))
                ->where('access_token', session('bet_access_token'))
                ->exists();

            if ($db_check) // check if session data is in database
            {
                return true;
            } else {
                self::logout(); // logout false session
                return false;
            }
        } else

            return false;

    }

    public static function suspended()
    {

       

            return \DB::table('accounts')->where('ID', self::id())->value('suspended') == 'yes' ? true : false;


        
    }


    
    public static function attempt($email, $password)
    {

        if (self::email_exist($email)) {
            $user_password = self::get_password($email);
            return \Hash::check($password, $user_password) ? true : false;
        } else
            return false;

    }

    public static function login_user()
    {
        $data = \Request::only(self::$loginFormFillable);

        if(self::attempt($data['email'],$data['password']))
        {
            self::create_session($data['email']);
            return true;
            
        }
        else {
            return false;
        }
    }

    public static function id()
    {
        return session('bet_admin_id');

    }

    // logout
  
    public static function currentUser()
    {
       return  \DB::table('accounts')->where('ID', self::id())->first();
    }

    public static function getInfoByEmail($email)
    {
        return \DB::table('accounts')->where('email', $email)->first();
    }

    // super admin
    public static function is_super_admin()
    {
        return self::currentUser()->user_type == 'super_admin' ? true : false;

    }

    public static function can($key)
    {
        if(self::suspended()) // if suspended return false for all permissions
        {
            return false;
        }
        else {

            return self::currentUser()->{'can_' . $key} == 'yes' ? true : false;
        
        }
    }
    public static function create_session($email)
    {

        $user_info = self::getInfoByEmail($email);

        session([
            'bet_admin_id' => $user_info->ID,
            'bet_access_token' => $user_info->access_token
        ]);

    }

    public static function get_password($email)
    {

        return \DB::table('accounts')->where('email', $email)->value('password');

    }

    public static function email_exist($email)
    {

        return \DB::table('accounts')->where('email', $email)->exists();

    }

    public static function logout_user()
    {

        \Request::session()->forget('bet_admin_id');
        \Request::session()->forget('bet_access_token');


    }
   

}
