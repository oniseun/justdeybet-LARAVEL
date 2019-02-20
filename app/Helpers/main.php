<?php


function ajax_alert($type,$message)
{
    ?>
    <div class="alert alert-<?=$type?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?=$message?>
    </div>
    <?php
}
function pager()
{
  ?>
<p>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  <?php
}

function ticket_payout($amount,$total_points)
{
  $return = 0;
  if($total_points >= 20 && $total_points <= 25)
  {
    $return = ($amount * 10);
  }
  elseif($total_points >= 26 && $total_points <= 30)
  {
    $return = ($amount * 20);
  }
  elseif($total_points>= 31 && $total_points <= 35)
  {
    $return = ($amount * 50);
  }
  elseif($total_points>= 36 && $total_points <= 40)
  {
    $return = ($amount * 100);
  }
  elseif($total_points >= 41)
  {
    $return = ($amount * 500);
  }

  return $return;
}

function score_drop($name,$id='',$class="")
{?>
  <select class="form-control score-drop <?=$class?> " id="<?=$id?>"  name="<?=$name?>">
    <option value=""></option>
    <?php
    for($i=0;$i<=10;$i++):
      ?>
      <option value="<?=$i?>"><?=$i?></option>
   <?php
    endfor;
   ?>
  </select>
  <?php
}

function toggle_select($var,$select)
{
  return $var === $select ? 'selected="selected"' : '';
}

function mark_link($link,$classname = 'active')
{
  return preg_match("|$link|",$_SERVER['REQUEST_URI']) ? $classname : '';
}
