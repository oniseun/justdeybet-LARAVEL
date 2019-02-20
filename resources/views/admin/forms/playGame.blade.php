@extends('master.adminOneColumn')
@section('title','Ticket Info ')
@section('content')

<div class="row">
    <br/>
          <br/>
            <div class="col-lg-offset-2 col-lg-8">

                <!-- ticket id panel -->
              <div class="panel  panel-default">
                <div class="panel-heading"><strong>Ticket Info</strong></div>
                  <div class="panel-body">
                    <h1 class="text-center"><small>Ticket No:</small><strong> {{ $ticketID }} </strong></h1><hr/>
                    <h1 class="text-center"><small>S/N: {{ $serialNumber }} </small></h1>

                  </div>
                </div>

                <!-- selected matches -->
                <div class="panel  panel-success">
                  <div class="panel-heading"><strong>Selected games</strong></div>
                    <div class="panel-body">
                    <table class="table data-table table-bordered">
                      <?php
                      $c = 1;
                      foreach($_POST['game_id'] as $gid):
                        extract($_POST['game_score'][$gid]);
                        if($c < 7)
                        {
                       ?>
                           <tr>
                             <th role="row"><?=$c?></th>
                             <td style="width:40%" class="text-center"><?=ucfirst($home_team)?></td>
                             <td style="font-weight:bold" class="text-center"><?=$home_score?></td>
                             <td style="font-weight:bold" class="text-center"><?=$away_score?></td>
                             <td style="width:40%" class="text-center"><?=ucfirst($away_team)?></td>
                           </tr>
                       <?php

                       $c++;
                      }
                     endforeach;
                       ?>
                   </table>

                    </div>
                </div>

                <!-- ticket registration -->

                <div class="panel  panel-info">
                <div class="panel-heading"><b>User Registration </b></div>
                <div class="panel-body">
                  <!-- form -->


                  <form class="form-horizontal" action="/admin/finalize/play/game" method="post">
                    @csrf
                    <!-- compute ticket info -->
                    <input type="hidden" name="ticket_id" value="{{ $ticketID }}"/>
                    <input type="hidden" name="serial_number" value="{{ $serialNumber }}"/>

                    <!-- compute game info -->
                    <?php
                    $c = 1;
                    foreach($_POST['game_id'] as $gid):
                      extract($_POST['game_score'][$gid]);
                      if($c < 7)
                      {
                     ?>

                     <input type="hidden" name="games[]" value="<?=$gid?>"/>
                     <input type="hidden" name="game_score[<?=$gid?>][home_score]" value="<?=$home_score?>"/>
                    <input type="hidden" name="game_score[<?=$gid?>][away_score]" value="<?=$away_score?>"/>

                     <?php
                     $c++;
                    }
                   endforeach;
                     ?>

                    <!-- user data -->
                    <div class="form-group">
                      <label for="amount" class="col-sm-3 control-label">Amount</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="amount" name="amount"  placeholder="Amount staked...">
                      </div>
                    </div>

                    <hr/>
                    <div class="form-group">
                      <label for="full_name" class="col-sm-3 control-label">Fullname</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="full_name" name="full_name"  placeholder="Enter player's name here...">
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email address</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email here...">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="phone" class="col-sm-3 control-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone here...">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="phone2" class="col-sm-3 control-label">Phone (2)</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone2" class="form-control" id="phone2" placeholder="Enter second phone number here...">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gender" class="col-sm-3 control-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="gender" name="gender">
                            <option value="male">Male</option>
                           <option value="female">Female</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="address" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="address" rows="4" id="address"></textarea>
                      </div>
                    </div>

                    <hr/>
                    <div class="form-group ">
                      <div class="col-sm-offset-3 col-sm-9">
                        <a class="btn btn-default"  href="/admin/dashboard" role="button">Back to game list</a>
                        <button type="submit" class="btn btn-success ajax-submit">Create ticket and print out</button>

                      </div>
                    </div>

                  </form>

              </div>
            </div>

            </div>
              <br/>

         </div>

  </div>
@endsection