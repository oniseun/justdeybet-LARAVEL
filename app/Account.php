<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public static  $updatePermissionFillable = ['account_id','can_create_tickets', 'can_add_games', 'can_update_scores', 'can_remove_games', 'can_play_games'],

        $updateInfoFillable = ['account_id','gender', 'username', 'email', 'shop_name', 'about', 'display_name'],


        $updatePasswordFillable = ['account_id','confirm_password'];

    public static function info($ID)
    {
        return \DB::table('accounts')->where('ID', $ID)->first();

    }

    public static function update_password()
    {
        $data = \Request::only(self::$updatePasswordFillable);
        $account_id = $data['account_id'];
        unset($data['account_id']); // field not in table
        $new_password = bcrypt($data['confirm_password']);

        return \DB::table('accounts')->where('ID', $account_id)->update(['password' => $new_password]);
    }

    public static function update_info()
    {
        $data = \Request::only(self::$updateInfoFillable);
        $account_id = $data['account_id'];
        unset($data['account_id']);
        return \DB::table('accounts')->where('ID', $account_id)->update($data);
    }

    public static function update_permission()
    {
        $data = \Request::only(self::$updatePermissionFillable);
        $account_id = $data['account_id'];
        unset($data['account_id']);
        return \DB::table('accounts')->where('ID', $account_id)->update($data);
    }

}
