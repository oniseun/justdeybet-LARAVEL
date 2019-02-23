<?php

use App\Auth;
$currentUser = Auth::currentUser();
?>
 
 <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top"  id="top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin/dashboard">JustDeyBet</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?=mark_link('admin/dashboard')?>"><a href="/admin/dashboard">Games</a></li>

            @if(Auth::is_super_admin())

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li  class="<?=mark_link('admin/list')?>"><a href="/admin/list">Manage admin</a></li>
                <li class="<?=mark_link('admin/suspended')?>"><a href="/admin/suspended">Suspended admins</a></li>
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Cashiers <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=mark_link('admin/cashiers/list')?>"><a href="/admin/cashiers/list">Manage cashiers</a></li>
                <li  class="<?=mark_link('admin/cashiers/suspended')?>"><a href="/admin/cashiers/suspended">Suspended cashiers</a></li>
              </ul>
            </li>
            @endif

             @if($currentUser->suspended ==='no')
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Tickets <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=mark_link('admin/tickets/list')?>"><a href="/admin/tickets/list">Manage tickets</a></li>
                <li class="<?=mark_link('admin/tickets/winning')?>"><a href="/admin/tickets/winning">Winning tickets</a></li>
                <li class="<?=mark_link('admin/tickets/paidout')?>"><a href="/admin/tickets/paidout">Paid Out tickets</a></li>
                <li class="<?=mark_link('admin/tickets/canceled')?>"><a href="/admin/tickets/canceled">Canceled tickets</a></li>
              </ul>
            </li>
            
            @endif

            <li class="<?=mark_link('admin/activities/list')?>"><a href="/admin/activities/list">Site Activities</a></li>
          </ul>
         
          @if($currentUser->suspended ==='no')
            <!--/.search ticket form -->
            <form class="navbar-form navbar-left" action="/admin/ticket" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" name="ticket_id" class="form-control" placeholder="Ticket No">
                </div>
                <button type="submit" class="btn btn-default">Ticket Info</button>
            </form>
            @endif

            <!--/.profile -->
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  {{ $currentUser->display_name }}({{ $currentUser->user_type }})<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=mark_link('admin/my/profile')?>"><a href="/admin/my/profile">Edit Profile</a></li>
                <li class="<?=mark_link('admin/my/password')?>"><a href="/admin/my/password">Change Password</a></li>
                <li class="<?=mark_link('admin/logout')?>"><a href="/admin/logout">Logout</a></li>
                <li><a target="_blank" href="/home">Open Homepage</a></li>
              </ul>
            </li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
 
