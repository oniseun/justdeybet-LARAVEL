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

    public function ticketInfo()
    {
        if(\Request::has(['ticket_id'])  )
        {
           
            $ticketId = \Request::input('ticket_id');

            if (\DB::table('tickets')->where('ticket_id', $ticketId)->exists())
            {
                $ticketInfo = Tickets::info($ticketId);
                $ticketGames = Games::ticket_games($ticketId);
                return view('public.ticketInfo', compact('ticketGames', 'ticketInfo'));
            }
        }
    }


    public function adminLogin()
    {
        return view('public.adminLogin');
    }

}
