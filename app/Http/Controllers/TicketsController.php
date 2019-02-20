<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use App\Games;

class TicketsController extends Controller
{
    public function manageList()
    {
        $allTickets = Tickets::all_tickets_list();
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.allTickets', compact('allTickets', 'ticketListCount'));
    }

    public function canceledTickets()
    {
        $canceledTickets = Tickets::canceled_tickets_list();
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.canceledTickets',compact('canceledTickets','ticketListCount'));
    }

    public function ConfirmCancelTicketForm($ticketID)
    {
        $ticketInfo = Tickets::info($ticketID);
        return view('admin.confirmAction.cancelTicket', compact('ticketInfo'));

    }
    public function confirmPayOutTicketForm($ticketID)
    {
        $ticketInfo = Tickets::info($ticketID);
        return view('admin.confirmAction.payOutTicket', compact('ticketInfo'));

    }

    public function paidOutTickets()
    {
        $paidOutTickets = Tickets::paidout_tickets_list();
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.paidOutTickets', compact('paidOutTickets', 'ticketListCount'));
    }

    public function info($ticketID)
    {
        if (\DB::table('tickets')->where('ticket_id', $ticketID)->exists()) {
            $ticketInfo = Tickets::info($ticketID);
            $ticketGames = Games::ticket_games($ticketID);
            return view('admin.ticketInfo', compact('ticketGames', 'ticketInfo'));
        }

    }

    public function ticketInfo()
    {
        if (\Request::has(['ticket_id'])) {

            $ticketID = \Request::input('ticket_id');

            if (\DB::table('tickets')->where('ticket_id', $ticketID)->exists()) {
                $ticketInfo = Tickets::info($ticketID);
                $ticketGames = Games::ticket_games($ticketID);
                return view('admin.ticketInfo', compact('ticketGames', 'ticketInfo'));
            }
        }
    }

    public function infoPublic($ticketID)
    {
        if (\DB::table('tickets')->where('ticket_id', $ticketID)->exists()) {
            $ticketInfo = Tickets::info($ticketID);
            $ticketGames = Games::ticket_games($ticketID);
            return view('public.ticketInfo', compact('ticketGames', 'ticketInfo'));
        }

    }

    public function ticketInfoPublic()
    {
        if (\Request::has(['ticket_id'])) {

            $ticketID = \Request::input('ticket_id');

            if (\DB::table('tickets')->where('ticket_id', $ticketID)->exists()) {
                $ticketInfo = Tickets::info($ticketID);
                $ticketGames = Games::ticket_games($ticketID);
                return view('public.ticketInfo', compact('ticketGames', 'ticketInfo'));
            }
        }
    }

    public function winningTickets()
    {
        $winningTickets = Tickets::winning_tickets_list();
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.winningTickets', compact('winningTickets', 'ticketListCount'));
    }
}
