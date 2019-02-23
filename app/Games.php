<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    public static $addUpdateGameFillable = ['home_team', 'away_team', 'season', 'league', 'match_stage', 'match_venue', 'match_date'] ,
    $removeGameFillable =['game_id'] ,
        $playGameFillable = ['games'],
        $createTicketFillable = ['ticket_id', 'serial_number', 'amount', 'full_name', 'email', 'phone', 'phone2', 'address'],
        $updateScoresFillable =  ['home_score','away_score','game_id'];





    public static function add($adminID)
    {
        $data = \Request::only(self::$addUpdateGameFillable);

        $data['creator_id'] = $adminID;
        $data['match_date'] = mysql_timestamp($data['match_date']);
        $data['date_updated'] = now();


        return \DB::table('games')->insert($data);
    }

    public static function play($creator_id)
    {
        $data = \Request::only(self::$playGameFillable);
        $ticketData = \Request::only(self::$createTicketFillable); 

        $gamesCount = 0;

        // create Games

        foreach ($data['games'] as $gameInfo) : // games already has [game_id] [home_score] [away_score]

            $gameInfo['home_win'] = $gameInfo['home_score'] > $gameInfo['away_score'] ? 'yes' : 'no';
            $gameInfo['away_win'] = $gameInfo['away_score'] > $gameInfo['home_score'] ? 'yes' : 'no';
            $gameInfo['draw'] = $gameInfo['home_score'] == $gameInfo['away_score'] ? 'yes' : 'no';

            $gameInfo['score_margin'] = $gameInfo['draw'] == 'yes' ? 0 : 0;
            $gameInfo['score_margin'] = $gameInfo['home_score'] > $gameInfo['away_score'] ? ($gameInfo['home_score'] - $gameInfo['away_score']) : $gameInfo['score_margin'];
            $gameInfo['score_margin'] = $gameInfo['away_score'] > $gameInfo['home_score'] ? ($gameInfo['away_score'] - $gameInfo['home_score']) : $gameInfo['score_margin'];
            $gameInfo['date_created'] = now();
            $gameInfo['date_updated'] = now();
            $gameInfo['creator_id'] = $creator_id;
            $gameInfo['ip_address'] = \Request::ip();
            $gameInfo['user_agent'] = \Request::header('User-Agent');
            $gameInfo['ticket_id'] = $ticketData['ticket_id'];
            \DB::table('played_games')->insert($gameInfo);


            $gamesCount++;

        endforeach;

        

        $ticketData['created_by'] = $creator_id;
        $ticketData['usage_count'] = $gamesCount;
        $ticketData['date_created'] = now();

        return \DB::table('tickets')->insert($ticketData);

        // create ticket

        
    }


    public static function update_info($game_id)
    {
        $data = \Request::only(self::$addUpdateGameFillable);

        $data['date_updated'] = now();
        
        $data['match_date'] = mysql_timestamp($data['match_date']);

        return \DB::table('games')->where('game_id',$game_id)->update($data);

    }

    public static function update_score()
    {


        $currentGameInfo = \Request::only(self::$updateScoresFillable);
        $game_id = $currentGameInfo['game_id'];

        $prevGameInfo = self::info($game_id);

        $prev_game_status = $prevGameInfo->game_status;

        if ($prev_game_status == 'played') {
  // get previous data and deduct points from db
            $prev_home_score = $prevGameInfo->home_score;
            $prev_away_score = $prevGameInfo->away_score;
            $prev_home_win = $prevGameInfo->home_win;
            $prev_away_win = $prevGameInfo->away_win;
            $prev_draw = $prevGameInfo->draw;

            $prev_score_margin = $prevGameInfo->score_margin;
        }
# ---------------------------------------------------

        $currentGameInfo['home_win'] = $currentGameInfo['home_score'] > $currentGameInfo['away_score'] ? 'yes' : 'no';
        $currentGameInfo['away_win'] = $currentGameInfo['away_score'] > $currentGameInfo['home_score'] ? 'yes' : 'no';
        $currentGameInfo['draw'] = $currentGameInfo['home_score'] == $currentGameInfo['away_score'] ? 'yes' : 'no';

        $currentGameInfo['score_margin'] = $currentGameInfo['draw'] == 'yes' ? 0 : 0;
        $currentGameInfo['score_margin'] = $currentGameInfo['home_score'] > $currentGameInfo['away_score'] ? ($currentGameInfo['home_score'] - $currentGameInfo['away_score']) : $currentGameInfo['score_margin'];
        $currentGameInfo['score_margin'] = $currentGameInfo['away_score'] > $currentGameInfo['home_score'] ? ($currentGameInfo['away_score'] - $currentGameInfo['home_score']) : $currentGameInfo['score_margin'];
        $currentGameInfo['date_updated'] = now();
        $currentGameInfo['game_status'] = 'played';

        $updateQuery = \DB::table('games')->where('game_id', $game_id)->update($currentGameInfo);

        if ($prev_game_status == 'played') {
    // decrement points by 5 if score was predicted correctly
            \DB::statement("UPDATE played_games SET points_won = points_won - 5 WHERE game_id = $game_id AND home_score = $prev_home_score AND away_score = $prev_away_score");


    // decrement points by 1 if home_win
            if ($prev_home_win == 'yes') {
                \DB::statement("UPDATE played_games SET points_won = points_won - 1 WHERE game_id = $game_id AND home_win = 'yes'");
      // decrement points by 1 if score margin is correct
                \DB::statement("UPDATE played_games SET points_won = points_won - 1 WHERE game_id = $game_id AND home_win = 'yes' AND score_margin = $prev_score_margin");
            }
    // decrement points by 1 if away_win
            if ($prev_away_win == 'yes') {
                \DB::statement("UPDATE played_games SET points_won = points_won - 1 WHERE game_id = $game_id AND away_win = 'yes'");
      // increment points by 1 if score margin is correct
                \DB::statement("UPDATE played_games SET points_won = points_won - 1 WHERE game_id = $game_id AND away_win = 'yes' AND score_margin = $prev_score_margin");
            }
    // deduct points by 1 if draw
            if ($prev_draw == 'yes') {
                \DB::statement("UPDATE played_games SET points_won = points_won - 1 WHERE game_id = $game_id AND draw = 'yes'");
      // deduct extra 1 point ( to make up for score margin - that is if predicted score is the exact)
                \DB::statement("UPDATE played_games SET points_won = points_won - 1 WHERE game_id = $game_id AND home_score = $prev_home_score AND away_score = $prev_away_score");
            }


  // end of removing points for reupdate
        }

        if ($updateQuery) {
    // increment points by 5 if score was predicted correctly
            \DB::statement("UPDATE played_games SET points_won = points_won + 5 WHERE game_id = $game_id AND home_score = {$currentGameInfo['home_score']} AND away_score = {$currentGameInfo['away_score']}");

    // increment points by 1 if home_win
            if ($currentGameInfo['home_win'] == 'yes') {
                \DB::statement("UPDATE played_games SET points_won = points_won + 1 WHERE game_id = $game_id AND home_win = 'yes'");
      // increment points by 1 if score margin is correct
                \DB::statement("UPDATE played_games SET points_won = points_won + 1 WHERE game_id = $game_id AND home_win = 'yes' AND score_margin = {$currentGameInfo['score_margin']}");
            }
    // increment points by 1 if away_win
            if ($currentGameInfo['away_win'] == 'yes') {
                \DB::statement("UPDATE played_games SET points_won = points_won + 1 WHERE game_id = $game_id AND away_win = 'yes'");
      // increment points by 1 if score margin is correct
                \DB::statement("UPDATE played_games SET points_won = points_won + 1 WHERE game_id = $game_id AND away_win = 'yes' AND score_margin = {$currentGameInfo['score_margin']}");
            }
    // increment points by 1 if draw
            if ($currentGameInfo['draw'] == 'yes') {
                \DB::statement("UPDATE played_games SET points_won = points_won + 1 WHERE game_id = $game_id AND draw = 'yes'");
      // add extra 1 point ( to make up for score margin - that is if predicted score is the exact)
                \DB::statement("UPDATE played_games SET points_won = points_won + 1 WHERE game_id = $game_id AND home_score = {$currentGameInfo['home_score']} AND away_score = {$currentGameInfo['away_score']}");
            }


            \DB::statement("UPDATE played_games SET played ='yes', date_updated = now() WHERE game_id = $game_id ");


        } 
        
            return $updateQuery;
        

    }

    public static function remove()
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
