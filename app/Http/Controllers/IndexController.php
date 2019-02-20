<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;
use App\Site;
use App\Tickets;

class IndexController extends Controller
{
    public function index()
    {
        $siteInfo = Site::info();
        $availableGames = Games::available_game_list();
        $playedGames = Games::played_game_list();

        return view('public.index',compact('siteInfo','availableGames','playedGames'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function howToPlay()
    {
        return view('public.howToPlay');
    }

    public function contactForm()
    {
        return view('public.contact');
    }

    public function howItWorks()
    {
        return view('public.howItWorks');
    }

    public function shops()
    {
        return view('public.shops');
    }

    public function terms()
    {
        return view('public.terms');
    }




    public function adminLogin()
    {
        return view('public.adminLogin');
    }

}
