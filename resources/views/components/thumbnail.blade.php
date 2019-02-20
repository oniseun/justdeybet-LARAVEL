<?php
use App\Auth;
use App\Site;

$siteInfo = Site::info();
$currentUser = Auth::currentUser();

?>
 <div class="row">

                           <div class="col-sm-6 col-md-4">
                         <div class="thumbnail">
                           <img src="/games.png" alt="games icon">
                           <div class="caption text-center">
                             <h3>Games <span class="label label-default">{{ number_format($siteInfo->games_count) }}</span></h3><hr/>
                             <p>games include list of matches (played/yet to be played) .
                               Games can be created by admin/cashier. Games added can only be played with tickets.</p><br/>
                               
                               @if(Auth::is_super_admin() || ($currentUser->can_add_games === 'yes' && $currentUser->suspended === 'no'))
                               
                             <p>
                               <a href="#" onClick="open_dialog('/admin/dialogs/add/game','Add Game',850,500)"
                                class="btn btn-primary btn-" role="button">Add new game</a> </p>
                              @endif
                           </div>
                         </div>
                       </div>

                        <div class="col-sm-6 col-md-4">
                         <div class="thumbnail">
                           <img src="/admin.png" alt="admin icon">
                           <div class="caption text-center">
                             <h3>Admin <span class="label label-default">{{ number_format($siteInfo->admin_count) }}</span></h3><hr/>
                             <p>Admins can perform functions like , adding games, generating tickets,
                                 play games and approve winnings , depending on the privileges alloted to them</p><br/>
                                 
                                 @if(Auth::is_super_admin())
                                   
                             <p><a href="#" onClick="open_dialog('/admin/dialogs/add/admin','Add Admin',850,500)"
                                class="btn btn-success btn-" role="button">Add new admin</a> </p>
                                @endif
                           </div>
                         </div>
                       </div>


                        <div class="col-sm-6 col-md-4">
                         <div class="thumbnail">
                           <img src="/cashier.png" alt="cashier icon">
                           <div class="caption text-center">
                             <h3>Cashiers <span class="label label-default">{{ number_format($siteInfo->cashier_count) }}</span></h3><hr/>
                             <p>Cashiers can perform functions like , adding games, generating tickets,
                                 play games and approve winnings , depending on the prvileges alloted to them </p><br/>
                              
                                 @if(Auth::is_super_admin())
                                
                             <p><a href="#" class="btn btn-default " onClick="open_dialog('/admin/dialogs/add/cashier','Add Cashier',850,500)"
                                role="button">Add new cashier</a></p>
                                @endif
                           </div>
                         </div>
                       </div>



  </div>
