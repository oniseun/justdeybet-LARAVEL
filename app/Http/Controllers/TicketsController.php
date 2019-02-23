<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Tickets;
use App\Games;
use App\Activities;

class TicketsController extends Controller
{
    public function manageList()
    {
        $allTickets = Auth::is_super_admin() ? Tickets::all_tickets_list() : Tickets::all_admin_tickets_list(Auth::id()) ;
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.allTickets', compact('allTickets', 'ticketListCount'));
    }

    public function canceledTickets()
    {
        $canceledTickets = Auth::is_super_admin() ?  Tickets::canceled_tickets_list() : Tickets::canceled_admin_tickets_list(Auth::id());
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.canceledTickets',compact('canceledTickets','ticketListCount'));
    }


    public function winningTickets()
    {
        $winningTickets = Auth::is_super_admin() ?  Tickets::winning_tickets_list() : Tickets::winning_admin_tickets_list(Auth::id()) ;
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.winningTickets', compact('winningTickets', 'ticketListCount'));
    }

    public function paidOutTickets()
    {
        
        $paidOutTickets = Auth::is_super_admin() ?  Tickets::paidout_tickets_list() : Tickets::paidout_admin_tickets_list(Auth::id());
        $ticketListCount = Tickets::ticket_list_count();
        return view('admin.list.paidOutTickets', compact('paidOutTickets', 'ticketListCount'));
    }



    public function confirmCancelTicketForm($ticketID)
    {
        if (!$this->ticketExist($ticketID)) {
            return view('admin.404');
            exit;
        }

        if (!$this->isCreator($ticketID) && !Auth::is_super_admin()) {
            return view('admin.404');
            exit;
        }

        $ticketInfo = Tickets::info($ticketID); 
        return view('admin.confirmAction.cancelTicket', compact('ticketInfo'));

    }
    public function confirmPayOutTicketForm($ticketID)
    {
        if (!$this->ticketExist($ticketID) || !$this->isWinningTicket($ticketID)) {
            return view('admin.404');
            exit;
        }
        if (!$this->isCreator($ticketID) && !Auth::is_super_admin()) {
            return view('admin.404');
            exit;
        }


        $ticketInfo = Tickets::info($ticketID);
        return view('admin.confirmAction.payOutTicket', compact('ticketInfo'));

    }

    

    public function info($ticketID)
    {
        if (!$this->ticketExist($ticketID)) {
            return view('admin.404');
            exit;
        }

            $ticketInfo = Tickets::info($ticketID);
            $ticketGames = Games::ticket_games($ticketID);
            return view('admin.ticketInfo', compact('ticketGames', 'ticketInfo'));
        

    }

    public function ticketInfo()
    {
       
        
        if (\Request::has(['ticket_id'])) {


            $ticketID = \Request::input('ticket_id');

            if (!$this->ticketExist($ticketID)) {
                return view('admin.404');
                exit;
            }

                $ticketInfo = Tickets::info($ticketID);
                $ticketGames = Games::ticket_games($ticketID);
                return view('admin.ticketInfo', compact('ticketGames', 'ticketInfo'));
            
        }
    }

    public function infoPublic($ticketID)
    {
        if ($this->ticketExist($ticketID)) {
            $ticketInfo = Tickets::info($ticketID);
            $ticketGames = Games::ticket_games($ticketID);
            return view('public.ticketInfo', compact('ticketGames', 'ticketInfo'));
        }

    }

    public function ticketInfoPublic()
    {
        if (\Request::has(['ticket_id'])) {

            $ticketID = \Request::input('ticket_id');

            if ($this->ticketExist($ticketID)) {
                $ticketInfo = Tickets::info($ticketID);
                $ticketGames = Games::ticket_games($ticketID);
                return view('public.ticketInfo', compact('ticketGames', 'ticketInfo'));
            }
        }
    }


    public function payOutTicket()
    {
        if (!\Request::has(Tickets::$payoutFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (!$this->ticketExist(\Request::only(Tickets::$payoutFillable)['ticket_id'])
            || !$this->isWinningTicket(\Request::only(Tickets::$payoutFillable)['ticket_id']) 
            ) {
            return back()->with('failure', "Item Does not exist");
            exit;
        }

        if (!$this->isCreator(\Request::only(Tickets::$payoutFillable)['ticket_id']) && !Auth::is_super_admin()) {
            return back()->with('failure', "You're not Authorized to payout this ticket");
            exit;
        }

        if (Tickets::make_payout()) {
            $input = \Request::only(Tickets::$payoutFillable);
            $mainMSG = "Successfully paid out N {$input['amount_paid_out']} to  {$input['ticket_id']} ";
            Activities::update_account_log(Auth::currentUser(), 'paid_out_ticket', $mainMSG);
            return redirect('/admin/ticket/'.$input['ticket_id'])->with('success', $mainMSG);


        } else {
            return back()->with('failure', 'Sorry this ticket is invalid or has already been settled  ');
        }
    }

    public function cancelTicket()
    {
        if (!\Request::has(Tickets::$cancelTicketFillable)) {
            return back()->with('failure', "Error in your form fields, please check, make corrections and submit again");
            exit;
        }

        if (!$this->ticketExist(\Request::only(Tickets::$cancelTicketFillable)['ticket_id'])) {
            return back()->with('failure', "Item Does not exist");
            exit;
        }

        if (!$this->isCreator(\Request::only(Tickets::$cancelTicketFillable)['ticket_id']) && !Auth::is_super_admin()) {
            return back()->with('failure', "You're not Authorized to cancel this ticket");
            exit;
        }

        if (Tickets::cancel()) {
            $input = \Request::only(Tickets::$cancelTicketFillable);
            $mainMSG = "Successfully canceled ticket: {$input['ticket_id']} ";
            Activities::update_account_log(Auth::currentUser(), 'ticket_cancel', $mainMSG);
            return redirect('/admin/tickets/canceled')->with('success', $mainMSG);


        } else {
            return back()->with('failure', 'Sorry this ticket is invalid  ');
        }
    }

    private function ticketExist($ticketID)
    {
        return \DB::table('tickets')->where('ticket_id', $ticketID)->exists();
    }

    private function isCreator($ticketID)
    {
        return \DB::table('tickets')->where('ticket_id', $ticketID)->where('created_by',Auth::id())->exists();
    }

    private function isWinningTicket($ticketID)
    {
        return \DB::table('tickets')
                ->where('ticket_id', $ticketID)
                ->where('cancelled', 'no')->where('paid_out', 'no')
                ->whereRaw('(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id ) >= 20')
                ->exists();
    }

    private function isPaidOut($ticketID)
    {
        return \DB::table('tickets')->where('ticket_id', $ticketID)->where('paid_out', 'yes')->exists();
    }

    private function isCanceled($ticketID)
    {
        return \DB::table('tickets')->where('ticket_id', $ticketID)->where('cancelled','yes')->exists();
    }

}
