<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="<?php echo css_url("bootstrap")?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo css_url("pe-icon-7-stroke")?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo css_url("ct-navbar")?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo css_url("home")?>" rel="stylesheet" type="text/css" />  
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" defer></script>
  <script src="<?php echo js_url("jquery-1.10.2")?>" type="text/javascript" defer></script>
	<script src="<?php echo js_url("bootstrap")?>" type="text/javascript" defer></script>	
	<script src="<?php echo js_url("ct-navbar")?>" type="text/javascript" defer></script>
    <style>
        
    </style>
</head>

<body>
 <div id="navbar-full">
    <div id="navbar">
       <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
        <nav class="navbar navbar-ct-blue navbar-fixed-top navbar-transparent" role="navigation">
          
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand navbar-brand-logo" href="http://www.creative-tim.com">
                    <div class="logo">
                    <img src="https://s3.amazonaws.com/creativetim_bucket/new_logo.png">
                    </div>
                    <div class="brand"> Blitz </div>
              </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                    <li>
                      <a href="<?php echo site_url() . '/events' ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Events</p>
                      </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="pe-7s-mail">
                                <span class="label">23</span>
                            </i>
                            <p>Messages</p>
                        </a>
                    </li> 
                    <li class="dropdown">
                          <?php if(!isset($_SESSION['logged_in']))
                          {
                            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="pe-7s-user"></i>
                                  <p>Account</p>
                              </a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Separated link</a></li>
                            </ul>';
                          }
                          else
                          {
                            echo '<a href="'. site_url() . '/events">
                              <i class="pe-7s-note2"></i>
                              <p>Log in</p>
                            </a>';
                          }
                          ?>

                    </li>
               </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div><!--  end navbar -->

<div class="blurred-container">
            <div class="img-src" style="background-image: url('<?php echo img_url('bg.png')?>')"></div>
</div>
 <div class="main">
        <div class="container tim-container main-container">
        <div class="col-lg-4">
          <a href="catalog.php#Stringed" class="circle_area"><?php echo img("lol.jpg", "img-circle center-block", "League of Legends image")?></a>
          <h2>League of Legends</h2>
          <p class="justify" >Fund or join the Summoner's Rift for 5 versus 5 epic fights</p>
          <p><a class="btn btn-default" href="catalog.php#Stringed" role="button">View catalog &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <a href="catalog.php#Percussion" class="circle_area"><?php echo img("fifa.jpg", "img-circle center-block", "Fifa image")?></a>
          <h2>Fifa</h2> 
          <p class="justify">Organize or participate in a Fifa tournament for crazy football matches</p>
          <p><a class="btn btn-default" href="catalog.php#Percussion" role="button">View catalog &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <a href="catalog.php#Wind" class="circle_area"><?php echo img("sc2.jpg", "img-circle center-block", "Starcraft 2 image")?></a>
          <h2>Starcraft II</h2>
          <p class="justify">Donate or play to see some Zerg rushes in amazing Starcraft II battles</p>
          <p><a class="btn btn-default" href="catalog.php#Wind" role="button">View catalog &raquo;</a></p>
        </div>
      </div>

      <div class="functionnality">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="thumbnail-icon">
                  <i class="fa fa-5x fa-gamepad "></i>
                </div>
                <div class="thumbnail-title">
                  Play
                </div>
                <div class="thumbnail-text">
                  Participate in games LAN (Local Area Network) among famous video games like Leagues of Legends, Starcraft II or FIFA. All you have to do is create an account and register to an event.
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="thumbnail-icon right">
                  <i class="fa fa-5x fa-wrench "></i>
                </div>
                <div class="thumbnail-title text-right">
                  Organize
                </div>
                <div class="thumbnail-text text-right">
                  You can organize LAN of the game you want. Create an event and set the information of it. If your event is attractive, people will fund and participate in it.
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="thumbnail-icon">
                  <i class="fa fa-5x fa-money "></i>
                </div>
                <div class="thumbnail-title">
                  Fund
                </div>
                <div class="thumbnail-text">
                  You love the spirit of competition and find that E-sport is not enough represented? You can provide money for the events present on Blitz in order to make them happpen.  
                </div>
            </div>
    </div>
</div>
  </div>
<!-- end container -->
</div>
<!-- end main -->
</body>
</html>