<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    public static $payoutFillable = ['amount_paid_out','ticket_id'];
    public static $cancelTicketFillable = ['ticket_id'];

    public static function cancel()
    {
        $data = \Request::only(self::$cancelTicketFillable);

        return \DB::table('tickets')->where('ticket_id',$data['ticket_id'])->update(['cancelled' => 'yes']);
    }
    
     public static function info($ticket_id)
    {

        return \DB::table('tickets')
                ->selectRaw(' *,(SELECT display_name FROM accounts WHERE ID = tickets.created_by LIMIT 1) as cashier_name,
                                (SELECT shop_name FROM accounts WHERE ID = tickets.created_by LIMIT 1) as cashier_shop_name,
                                (SELECT ID FROM accounts WHERE ID = tickets.created_by LIMIT 1) as cashier_shop_id,
                                (SELECT count(*) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as games_played,
                                (select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
                ->where('ticket_id', $ticket_id)->first();

        }
    public static function make_payout()
    {
        $data = \Request::only(self::$payoutFillable);
        
        $data['paid_out'] ='yes';

        return \DB::table('tickets')->where('ticket_id', $data['ticket_id'])->update($data);
    }


    # [ All Tickets]
    public static function all_tickets_list($limit = 15)
    {
        return \DB::table('tickets')
                ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
                ->where('cancelled','no')->where('paid_out','no')
                ->orderBy('date_created','DESC')
                ->limit($limit)->get();
    }

  

    public static function winning_tickets_list($limit = 15)
    {
        return \DB::table('tickets')
                ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
                ->where('cancelled', 'no')->where('paid_out', 'no')
                ->whereRaw('(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id ) >= 20')
                ->orderBy('date_created', 'DESC')
                ->limit($limit)->get();
    }

    public static function paidout_tickets_list($limit = 15)
    {
        return \DB::table('tickets')
                ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
                ->where('paid_out', 'yes')
                ->orderBy('date_created', 'DESC')
                ->limit($limit)->get();
    }

    public static function canceled_tickets_list($limit = 15)
    {
        return \DB::table('tickets')
                ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
                ->where('cancelled', 'yes')
                ->orderBy('date_created', 'DESC')
                ->limit($limit)->get();
    }

    # [ Admin tickets ]

    public static function all_admin_tickets_list($adminID, $limit = 15)
    {
        return \DB::table('tickets')
            ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
            ->where('cancelled', 'no')->where('paid_out', 'no')
            ->where('created_by', $adminID)
            ->orderBy('date_created', 'DESC')
            ->limit($limit)->get();
    }

    public static function winning_admin_tickets_list($adminID, $limit = 15)
    {
        return \DB::table('tickets')
            ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
            ->where('cancelled', 'no')->where('paid_out', 'no')
            ->whereRaw('(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id ) >= 20')
            ->where('created_by', $adminID)
            ->orderBy('date_created', 'DESC')
            ->limit($limit)->get();
    }

    public static function paidout_admin_tickets_list($adminID, $limit = 15)
    {
        return \DB::table('tickets')
            ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
            ->where('paid_out', 'yes')
            ->where('created_by', $adminID)
            ->orderBy('date_created', 'DESC')
            ->limit($limit)->get();
    }

    public static function canceled_admin_tickets_list($adminID, $limit = 15)
    {
        return \DB::table('tickets')
            ->selectRaw(' *,(select sum(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id LIMIT 1) as total_points')
            ->where('cancelled', 'yes')
            ->where('created_by',$adminID)
            ->orderBy('date_created', 'DESC')
            ->limit($limit)->get();
    }

    # [ Ticket Counts ]
    public static function ticket_list_count()
    {
        return \DB::select("SELECT
  (SELECT count(*) FROM tickets WHERE  cancelled ='no' AND paid_out ='no' ) AS ticket_list_count,
  (SELECT count(*) FROM tickets WHERE cancelled ='no' AND paid_out ='no' 
  AND (SELECT SUM(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id) > 20)
  AS winning_ticket_count,
  (SELECT count(*) FROM tickets WHERE paid_out ='yes'  ) AS paid_out_ticket_count,
  (SELECT count(*) FROM tickets WHERE  cancelled = 'yes'  ) AS cancelled_ticket_count;


  ")[0];

    }

    public static function admin_ticket_list_count($adminID)
    {
        return \DB::select("SELECT
  (SELECT count(*) FROM tickets WHERE  cancelled ='no' AND paid_out ='no' AND created_by = $adminID) AS ticket_list_count,
  (SELECT count(*) FROM tickets WHERE cancelled ='no' AND paid_out ='no' $ AND created_by = $adminID
  AND (SELECT SUM(points_won) FROM played_games WHERE played_games.ticket_id = tickets.ticket_id) > 20)
  AS winning_ticket_count,
  (SELECT count(*) FROM tickets WHERE paid_out ='yes'  AND created_by = $adminID ) AS paid_out_ticket_count,
  (SELECT count(*) FROM tickets WHERE  cancelled = 'yes'  AND created_by = $adminID  ) AS cancelled_ticket_count;


  ");

    }

}
