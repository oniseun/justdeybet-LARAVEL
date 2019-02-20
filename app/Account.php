<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public static  $updatePermissionFillable = ['can_create_tickets', 'can_add_games', 'can_update_scores', 'can_remove_games', 'can_play_games'],

        $updateProfileFillable = ['gender', 'username', 'email', 'shop_name', 'about', 'display_name'],


        $changePasswordFillable = ['new_password'];

    public static function info($ID)
    {
        return \DB::table('accounts')->where('ID', $ID)->first();

    }

    public static function update_password($accountID)
    {
        $data = \Request::only(self::$changePasswordFillable);

        $data['new_password'] = bycrypt($data['new_password']);

        return \DB::table('accounts')->where('ID', $accountID)->update($data);
    }

    public static function update_profile($accountID)
    {
        $data = \Request::only(self::$updateProfileFillable);

        return \DB::table('accounts')->where('ID', $accountID)->update($data);
    }

    public static function update_permission($accountID)
    {
        $data = \Request::only(self::$updatePermissionFillable);

        return \DB::table('accounts')->where('ID', $accountID)->update($data);
    }

}
