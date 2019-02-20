 
  
  <nav class="navbar navbar-inverse navbar-fixed-top"  id="top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><b>JustDeyBet</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--/.left navigation -->
          <ul class="nav navbar-nav">
            <li class="<?=mark_link('home')?>"><a href="/home">Home</a></li>
            <li class="<?=mark_link('how-to-play')?>"><a href="/how-to-play">How to play</a></li>
            <li class="<?=mark_link('how-it-works')?>"><a href="/how-it-works">How it works</a></li>
            <li class="<?=mark_link('shops')?>"><a href="/shops">Approved shops</a></li>
          </ul>

            <!--/.search ticket form -->
            <form class="navbar-form navbar-left" action="/ticket" method="post">
              @csrf
                <div class="form-group">
                  <input type="text" name="ticket_id" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Ticket Info</button>
            </form>

            <!--/.right navigation -->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Admin Login</a></li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Other links<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="<?=mark_link('terms.php')?>"><a href="/terms">Terms and conditions</a></li>
                <li class="<?=mark_link('contact.php')?>"><a href="/contact">Contact us</a></li>
              </ul>
            </li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
