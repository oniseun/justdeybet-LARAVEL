<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashiers extends Model
{
        public static $addCashierFillable = ['gender', 'username',  'email', 'about', 'display_name',
        'can_create_tickets', 'can_add_games', 'can_update_scores', 'can_remove_games', 'can_play_games'], 

        $updatePermissionFillable = ['can_create_tickets', 'can_add_games', 'can_update_scores', 'can_remove_games', 'can_play_games'],

        $suspendReactivateCashierFillable = ['cashier_id'];

    public static function info($ID)
    {
        return \DB::table('accounts')->where('ID', $ID)->where('user_type','cashier')->first();

    }

    public static function add_cashier()
    {
        $data = \Request::only(self::$addCashierFillable);
        $defaultPassword = 'jdbPassword#2017';

        $data['date_registered'] = now();
        $data['last_activity']  = now();
        $data['password'] = bycrypt($defaultPassword);

        $data['user_type'] = 'cashier';


        return \DB::table('accounts')->insert($data);
    }

    public static function suspend_cashier()
    {
        $data = \Request::only(self::$suspendReactivateCashierFillable);

        return \DB::table('accounts')->where('user_type', 'cashier')->where('ID', $data['cashier_id'])->update(['suspended' => 'yes']);
    }

    public static function reactivate_cashier()
    {
        $data = \Request::only(self::$suspendReactivateCashierFillable);

        return \DB::table('accounts')
            ->where('user_type', 'cashier')
            ->where('ID', $data['cashier_id'])
            ->where('suspended', 'yes')->update(['suspended' => 'no']);
    }

    public static function update_permission($cashierID)
    {
        $data = \Request::only(self::$updatePermissionFillable);

        return \DB::table('accounts')->where('user_type', 'cashier')->where('ID', $cashierID)->update($data);
    }

    public static function _list($limit = 15)
    {
        return  \DB::table('accounts')
                ->where('user_type','cashier')
                ->orderBy('date_registered','DESC')
                ->limit($limit)->get();

    }

    public static function suspended($limit = 15)
    {
        return \DB::table('accounts')
                ->where('user_type', 'cashier')
                ->where('suspended','yes')
                ->orderBy('date_registered', 'DESC')
                ->limit($limit)->get();

    }
}
