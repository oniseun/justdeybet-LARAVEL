<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;
use App\Auth;
use App\Admin;
use App\Site;
use App\Activities;

class GamesController extends Controller
{
    public function addGameForm()
    {
        if (!Auth::is_super_admin() && !Auth::can('add_games')) {
            return back()->with('failure', "You are not authorized to perform this action");
            exit;
        }

        return view('admin.dialogs.addGame');
    }
    
    public function dashboard()
    {
        $availableGames = Games::available_game_list();
        $playedGames = Games::played_game_list();
        $currentUser = Auth::currentUser();
        $siteInfo = Site::info();

        return view('admin.dashboard',compact('availableGames','playedGames','currentUser','siteInfo'));
    }

    public function confirmRemoveGameForm($game_id)
    {
        if (!Auth::is_super_admin() && (!Auth::can('remove_games') || !$this->isCreator($game_id))) {
            return view('admin.404');
            exit;
        }

        if (!$this->gameExist($game_id)) {
            return view('admin.404');
            exit;
        }


        $gameInfo = Games::info($game_id);

        return view('admin.confirmAction.removeGame', compact('gameInfo'));
    }

    public function updateScoreForm($game_id)
    {
        if (!$this->gameExist($game_id)) {
            return view('admin.404');
            exit;
        }

        if (!Auth::is_super_admin() && (!Auth::can('remove_games') || !$this->isCreator($game_id))) {
            return view('admin.404');
            exit;
        }

        $gameInfo = Games::info($game_id);

        return view('admin.confirmAction.updateScore', compact('gameInfo'));
    }

    public function playGameForm()
    {

        if (!Auth::is_super_admin() && !Auth::can('play_games')) {
            return view('admin.404');
            exit;
        }

        $char_limit = 8;
        $ticketID = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $char_limit));
        $serialNumber = rand(4566, 7665) . rand(5556, 9999) . rand(4889, 9999);


        $games = \Request::input('games');
        //print_r($allGames);
        $gameList = json_decode(json_encode($games));
        
        return view('admin.forms.playGame', compact('ticketID','serialNumber','gameList'));


    }

    public function addGame()
    {
        if (!\Request::has(Games::$addUpdateGameFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (!Auth::is_super_admin() && !Auth::can('add_games')) {
            echo ajax_alert('warning', "You are not authorized to perform this action");
            exit;
        }

        if(Games::add(Auth::id()))
        {
            $input = \Request::only(Games::$addUpdateGameFillable);
            Activities::update_account_log(Auth::currentUser(),'game_add', "Added {$input['home_team']} vs  {$input['away_team']} to games");
            echo ajax_alert('success', 'Successfully added match');
        }
        else {
            echo ajax_alert('warning', 'Sorry an error occured');
        }
    }

    public function playGame()
    {
        if (!\Request::has(Games::$playGameFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if(!Auth::is_super_admin() && !Auth::can('play_games'))
        {
            return back()->with('failure', "You are not authorized to perform this action");
            exit;
        }

        if (Games::play(Auth::id())) {
            $inputGames = \Request::only(Games::$playGameFillable);
            $gamesCount = count($inputGames['games']);
            $inputTicket = \Request::only(Games::$createTicketFillable); 
            Activities::update_account_log(Auth::currentUser(), 'played_game', "Played $gamesCount games for {$inputTicket['full_name']} with ticket:  {$inputTicket['ticket_id']}");
            $redirectMsg = " Ticket:<b> {$inputTicket['ticket_id']} </b> for <b>$gamesCount games</b> created successfully";
            return redirect('/admin/ticket/'. $inputTicket['ticket_id'])->with('success', $redirectMsg);        
            
            
        } else {
            return back()->with('failure', 'Sorry this ticket has been used ');
        }
    }

    public function removeGame()
    {
        if (!\Request::has(Games::$removeGameFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }
        if (!$this->gameExist(\Request::only(Games::$removeGameFillable)['game_id'])) {
            return back()->with('failure', "Item Does not exist");
            exit;
        }

        if (!Auth::is_super_admin() && (!Auth::can('remove_games') || !$this->isCreator(\Request::only(Games::$removeGameFillable)['game_id']))) {
            return back()->with('failure', "You are not authorized to perform this action");
            exit;
        }

        if (Games::remove()){
            $input = \Request::only(Games::$removeGameFillable);
            $gameInfo = Games::info($input['game_id']);
            $returnMSG = "Removed :{$gameInfo->home_team} v {$gameInfo->away_team} ";
            Activities::update_account_log(Auth::currentUser(), 'game_removal', $returnMSG );
            return back()->with('success', $returnMSG);


        } else {
            return back()->with('failure', 'Sorry this game is invalid ');
        }
    }

    public function updateGameScore()
    {
        if (!\Request::has(Games::$updateScoresFillable)) {
            echo ajax_alert('warning', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (!$this->gameExist(\Request::only(Games::$updateScoresFillable)['game_id'])) {
            echo ajax_alert('warning', "Item Does not exist");
            exit;
        }

        if (!Auth::is_super_admin() && (!Auth::can('update_scores') || $this->isCreator(\Request::only(Games::$updateScoresFillable)['game_id']))) {
       
            return back()->with('failure', "You are not authorized to perform this action");
            exit;
        }

        if (Games::update_score()) {
            $input = \Request::only(Games::$updateScoresFillable);
            $gameInfo = Games::info($input['game_id']);
            Activities::update_account_log(Auth::currentUser(), 'game_scores_update', "Successfully updated game scores :{$gameInfo->home_team} v {$gameInfo->away_team} ");
            echo ajax_alert('success', "Successfully updated scores  {$input['home_score']} - {$input['away_score']}");

        } else {
            echo ajax_alert('warning', 'Sorry an error occured');
        }
    }

    private function gameExist($game_id)
    {
        return \DB::table('games')->where('game_id', $game_id)->where('deleted','no')->exists();
    }

    private function isCreator($game_id)
    {
        return \DB::table('games')->where('game_id', $game_id)->where('creator_id', Auth::id())->exists();
    }



    
}
