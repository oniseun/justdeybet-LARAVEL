<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('/', 'home', 301);
Route::redirect('index', 'home', 301);
Route::get('home', 'IndexController@index');
Route::get('about', 'IndexController@about');
Route::get('how-to-play', 'IndexController@howToPlay');
Route::get('contact', 'IndexController@contactForm');
Route::get('how-it-works', 'IndexController@howItWorks');
Route::get('shops', 'IndexController@shops');
Route::get('terms', 'IndexController@terms');
Route::get('how-to-play', 'IndexController@howToPlay');
Route::get('login', 'IndexController@adminLogin');
Route::post('ticket', 'TicketsController@ticketInfoPublic');
Route::get('ticket/{ticketID}', 'TicketsController@infoPublic')->where('ticketID', '[A-Za-z0-9]+');

Route::get('test', function () {
    echo mysql_timestamp("28 june 1993 13:00");
});


Route::group(['prefix' => 'admin'], function () {
    Route::options('{any?}', function () {
        return response('', 200);
    })->where('any', '.*');

    Route::get('dashboard','GamesController@dashboard');
    Route::get('dialogs/add/game', 'GamesController@addGameForm');
    Route::get('remove/game/{gameID}', 'GamesController@confirmRemoveGameForm')->where('gameID', '[0-9]+');
    Route::get('update/game/score/{gameID}', 'GamesController@updateScoreForm')->where('gameID', '[0-9]+');
    Route::post('play/game', 'GamesController@playGameForm');
    Route::post('finalize/add/game', 'GamesController@addGame');
    Route::post('finalize/play/game', 'GamesController@playGame');
    Route::post('finalize/update/game/score', 'GamesController@updateGameScore');
    Route::post('finalize/remove/game', 'GamesController@removeGame');

    
    Route::get('list', 'AdminController@manageList'); // admin list 
    Route::get('suspended', 'AdminController@suspendedList'); // suspended admins
    Route::get('dialogs/add/admin', 'AdminController@addAdminForm');
    Route::get('suspend/{adminID}', 'AdminController@confirmSuspensionForm')->where('adminID', '[0-9]+');
    Route::get('reactivate/{adminID}', 'AdminController@confirmReactivationForm')->where('adminID', '[0-9]+');
    Route::post('finalize/add/admin', 'AdminController@addAdmin');
    Route::post('finalize/suspend/admin', 'AdminController@suspendAdmin');
    Route::post('finalize/reactivate/admin', 'AdminController@reactivateAdmin');

    Route::get('cashiers/list', 'CashiersController@manageList');
    Route::get('cashiers/suspended', 'CashiersController@suspendedList');
    Route::get('dialogs/add/cashier', 'CashiersController@addCashierForm');
    Route::get('suspend/cashier/{cashierID}', 'CashiersController@confirmSuspensionForm')->where('cashierID', '[0-9]+');
    Route::get('reactivate/cashier/{cashierID}', 'CashiersController@confirmReactivationForm')->where('cashierID', '[0-9]+');
    Route::post('finalize/add/cashier', 'CashiersController@addCashier');
    Route::post('finalize/suspend/cashier', 'CashiersController@suspendCashier');
    Route::post('finalize/reactivate/cashier', 'CashiersController@reactivateCashier');

    Route::get('tickets/list', 'TicketsController@manageList');
    Route::get('tickets/canceled', 'TicketsController@canceledTickets');
    Route::get('tickets/winning', 'TicketsController@winningTickets');
    Route::get('tickets/paidout', 'TicketsController@paidOutTickets');
    Route::get('ticket/{ticketID}', 'TicketsController@info')->where('ticketID', '[A-Za-z0-9]+');
    Route::post('ticket', 'TicketsController@ticketInfo');
    Route::get('cancel/ticket/{ticketID}', 'TicketsController@confirmCancelTicketForm')->where('ticketID', '[A-Za-z0-9]+');
    Route::get('payout/ticket/{ticketID}', 'TicketsController@confirmPayOutTicketForm')->where('ticketID', '[A-Za-z0-9]+');
    Route::post('finalize/cancel/ticket', 'TicketsController@cancelTicket');
    Route::post('finalize/payout/ticket', 'TicketsController@payOutTicket');

    Route::get('activities/list', 'ActivitiesController@manageList');
    Route::get('next/activities/{timestamp}', 'ActivitiesController@nextSiteActivities')->where('timestamp', '[0-9]+');

    Route::get('my/profile', 'ProfileController@changeInfoForm');
    Route::get('my/password', 'ProfileController@changePasswordForm');
    Route::get('logout', 'ProfileController@logoutForm');  
  
    Route::get('dialogs/edit/account/info/{accountID}', 'AccountController@infoUpdateForm')->where('accountID', '[0-9]+');
    Route::get('dialogs/edit/account/password/{accountID}', 'AccountController@passwordUpdateForm')->where('accountID', '[0-9]+');
    Route::get('dialogs/edit/account/permission/{accountID}', 'AccountController@permissionUpdateForm')->where('accountID', '[0-9]+');






    

    
});