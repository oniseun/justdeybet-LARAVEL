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

    public function removeGame($game_id)
    {

        $gameInfo = Games::info($game_id);

        return view('admin.confirmAction.removeGame', compact('gameInfo'));
    }

    
}
