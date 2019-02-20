<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public static function info()
    {
        return \DB::select("SELECT

      (SELECT count(*) FROM accounts WHERE user_type ='admin' limit 1 ) as admin_count,
      (SELECT count(*) FROM admin_logs ) AS activity_count,
      (SELECT count(*) FROM accounts WHERE user_type ='admin' AND suspended ='yes' limit 1 ) as suspended_admin_count,
    (SELECT count(*) FROM accounts WHERE user_type ='cashier' limit 1  ) as cashier_count,
    (SELECT count(*) FROM accounts WHERE user_type ='cashier' AND suspended ='yes' limit 1 ) as suspended_cashier_count,
    (SELECT count(*) FROM tickets WHERE cancelled = 'no'  limit 1 ) as ticket_count,
    (SELECT count(*) FROM games WHERE deleted ='no'  limit 1) as games_count,
    (SELECT count(*) FROM games WHERE deleted ='no' AND game_status = 'not-played' limit 1) as available_games_count,
    (SELECT count(*) FROM games WHERE deleted ='no' AND game_status = 'played' limit 1) as played_games_count,

    (SELECT count(*) FROM admin_logs  limit 1) as activity_count

")[0];

    }
}
