<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="<?php echo css_url("bootstrap")?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo css_url("pe-icon-7-stroke")?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo css_url("ct-navbar")?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo css_url("eventpage")?>" rel="stylesheet" type="text/css" />  
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" defer></script>
  <script src="<?php echo js_url("jquery-1.10.2")?>" type="text/javascript" defer></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
  <script src="<?php echo js_url("bootstrap")?>" type="text/javascript" defer></script>	
  <script src="<?php echo js_url("ct-navbar")?>" type="text/javascript" defer></script>
</head>

<body>
 <div id="navbar-full">
  <div id="navbar">
       <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
      -->
      <nav class="navbar navbar-ct-blue navbar-fixed-top" role="navigation">

        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navbar-brand-logo" href="<?php echo str_replace(base_url(), 'p/index.php/', '/') ?>">
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
                <a href="<?php echo site_url() . 'events' ?>">
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
                <?php if(isset($_SESSION['logged_in']))
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
                </ul></li>
                <li>
                  <a href="'. site_url() .'eventpage/logout/' . $event->id . '">
                    <i class="pe-7s-note2"></i>
                    <p>Log out</p>
                  </a>';
                }
                else
                {
                  echo '<a href="'. site_url() . 'login">
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
    <div class="container main">
    <div class='row'>
        <div class='col-md-12'>
          <div>
            <?php echo img($event->image_large_path, "center-block", "event"); ?>
            <div class="infos">
              
              <h1><?php echo $event->name; ?></h1>
              <p class="description"> <?php echo $event->description; ?></p>
              <div class="date">
              <i class="fa fa-gamepad"></i>
              <p><?php echo $event->place; ?></p>
              </div>
              <div class="place">
              <i class="fa fa-gamepad"></i>
              <p><?php echo $event->date; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>