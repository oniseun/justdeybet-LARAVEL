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
Route::post('ticket', 'IndexController@ticketInfo');


Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard','GamesController@dashboard');
    Route::get('list', 'AdminController@manageList'); // admin list 
    Route::get('suspended', 'AdminController@suspendedList'); // suspended admins
    Route::get('cashiers/list', 'CashiersController@manageList');
    Route::get('cashiers/suspended', 'CashiersController@suspendedList');

    Route::get('tickets/list', 'TicketsController@manageList');
    Route::get('tickets/canceled', 'TicketsController@canceledTickets');
    Route::get('tickets/winning', 'TicketsController@winningTickets');
    Route::get('tickets/paidout', 'TicketsController@paidOutTickets');
    Route::get('ticket/{ticketID}', 'TicketsController@info')->where('ticketID', '[A-Za-z0-9]+');
    Route::post('ticket', 'TicketsController@ticketInfo');

    Route::get('activities/list', 'ActivitiesController@manageList');
    Route::get('next/activities/{timestamp}', 'ActivitiesController@nextSiteActivities')->where('timestamp', '[0-9]+');

    Route::get('my/profile', 'ProfileController@changeInfoForm');
    Route::get('my/password', 'ProfileController@changePasswordForm');
    Route::get('logout', 'ProfileController@logoutForm');

    Route::get('dialogs/add/admin', 'AdminController@addAdminForm');
    Route::get('dialogs/add/cashier', 'CashiersController@addCashierForm');
    Route::get('dialogs/add/game', 'GamesController@addGameForm');
    Route::get('dialogs/edit/account/info/{accountID}', 'AccountController@infoUpdateForm')->where('accountID', '[0-9]+');
    Route::get('dialogs/edit/account/password/{accountID}', 'AccountController@passwordUpdateForm')->where('accountID', '[0-9]+');
    Route::get('dialogs/edit/account/permission/{accountID}', 'AccountController@permissionUpdateForm')->where('accountID', '[0-9]+');



    

    
});