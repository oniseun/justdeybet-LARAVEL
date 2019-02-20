<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;
use App\Auth;
use App\Admin;
use App\Site;

class GamesController extends Controller
{
    public function addGameForm()
    {
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

    public function ConfirmRemoveGameForm($game_id)
    {

        $gameInfo = Games::info($game_id);

        return view('admin.confirmAction.removeGame', compact('gameInfo'));
    }

    public function updateScoreForm($game_id)
    {

        $gameInfo = Games::info($game_id);

        return view('admin.confirmAction.updateScore', compact('gameInfo'));
    }

    public function playGameForm()
    {

        $char_limit = 8;
        $ticketID = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $char_limit));
        $serialNumber = rand(4566, 7665) . rand(5556, 9999) . rand(4889, 9999);
    }

    
}
