<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    public static $addUpdateGameFillable = ['home_team', 'away_team', 'season', 'league', 'match_stage', 'match_venue', 'match_date'] ,
    $removeGameFillable =['game_id'] ;



    public static function add_game($adminID)
    {
        $data = \Request::only(self::$addUpdateGameFillable);

        $data['creator_id'] = $adminID;
        $data['match_date'] = now($data['match_date']);


        return \DB::table('games')->insert($data);
    }


    public static function update_game($game_id)
    {
        $data = \Request::only(self::$addUpdateGameFillable);

        $data['date_updated'] = now();
        
        $data['match_date'] = now($data['match_date']);

        return \DB::table('games')->where('game_id',$game_id)->update($data);

    }

    public static function remove_game($game_id)
    {
        $data = \Request::only(self::$removeGameFillable);

        return \DB::table('games')->where('game_id',$data['game_id'])->update(['deleted'=>'yes']) ;
    }

    public static function info($game_id)
    {
        return \DB::table('games')
                ->selectRaw('* , (SELECT count(*) FROM played_games WHERE played_games . game_id = games . game_id LIMIT 1) as played_games')
                ->where('deleted','no')
                ->where('game_id',$game_id)->first();
    }

// game list
    public static function available_game_list($limit = 10)
    {

        return \DB::table('games')
            ->selectRaw('* , (SELECT count(*) FROM played_games WHERE played_games . game_id = games . game_id LIMIT 1) as played_games')
            ->where('deleted', 'no')
            ->where('game_status','not-played')
            ->orderBy('match_date','DESC')
            ->limit($limit)
            ->get();

    }

    
// game list
    public static function played_game_list($limit = 10)
    {
     return \DB::table('games')
            ->selectRaw(' *,  (SELECT count(*) FROM played_games WHERE played_games.game_id = games.game_id LIMIT 1) as played_games')
            ->where('deleted', 'no')
            ->where('game_status', 'played')
            ->orderBy('match_date', 'DESC')
            ->limit($limit)
            ->get();

    }

    public static function ticket_games($ticket_id)
    {
        return \DB::table('played_games')
            ->selectRaw(' * ,
      (SELECT home_team FROM games where played_games.game_id = games.game_id) as home_team,
      (SELECT away_team FROM games where played_games.game_id = games.game_id) as away_team,
      (SELECT home_score FROM games where played_games.game_id = games.game_id) as actual_home_score,
      (SELECT away_score FROM games where played_games.game_id = games.game_id) as actual_away_score,
      (SELECT match_date FROM games where played_games.game_id = games.game_id) as match_date')
            ->where('ticket_id', $ticket_id)
            ->orderBy('date_created', 'DESC')
            ->limit(100)
            ->get();

    }

}
