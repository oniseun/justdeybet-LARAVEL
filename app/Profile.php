<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public static $updateInfoFillable = ['gender', 'username', 'email', 'shop_name', 'about', 'display_name'],
    $updatePasswordFillable = ['new_password'];

    public static function update_password($userID)
    {
        $data = \Request::only(self::$updatePasswordFillable);

        $update['password'] = bcrypt($data['new_password']);

        $update['last_activity'] = now();

        return \DB::table('accounts')->where('ID', $userID)->update($update);
    }



    public static function update_info($userID)
    {
        $data = \Request::only(self::$updateInfoFillable);

        $data['last_activity'] = now();

        return \DB::table('accounts')->where('ID', $userID)->update($data);
    }
}
