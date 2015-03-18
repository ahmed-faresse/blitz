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
        .fa-heart{
            color: #F74933;
        }   
        .space-100{
            height: 100px;
            display: block;
        }
        pre.prettyprint{
            background-color: #ffffff;
            border: 1px solid #999;
            margin-top: 20px;
            padding: 20px;
            text-align: left;
        }
        .atv, .str{
            color: #05AE0E;
        }
        .tag, .pln, .kwd{
             color: #3472F7;
        }
        .atn{
          color: #2C93FF;
        }
        .pln{
           color: #333;
        }
        .com{
            color: #999;
        } 
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
                        <a href="javascript:void(0);" data-toggle="search" class="hidden-xs">
                            <i class="pe-7s-search"></i>
                            <p>Search</p>
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
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                          </ul>
                    </li>
               </ul>
               <form class="navbar-form navbar-right navbar-search-form" role="search">                  
                 <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                 </div> 
              </form>
              
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div><!--  end navbar -->

<div class="blurred-container">
            <div class="img-src" style="background-image: url('<?php echo img_url('bg.jpg')?>')"></div>
        </div>
 <div class="main">
        <div class="container tim-container" style="max-width:1400px; padding-top:100px">
        <div class="col-lg-4">
          <a href="catalog.php#Stringed" class="circle_area"><?php echo img("lol.jpg", "img-circle center-block", "League of Legends image")?></a>
          <h2>Sringed Instruments</h2>
          <p class="justify" >Always wanted to play guitar? Interested in playing violin? Here is the catalog of the stringed instruments</p>
          <p><a class="btn btn-default" href="catalog.php#Stringed" role="button">View catalog &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <a href="catalog.php#Percussion" class="circle_area"><?php echo img("fifa.jpg", "img-circle center-block", "Fifa image")?></a>
          <h2>Percussion Instruments</h2>
          <p class="justify">Enjoy a wide choice of percussion instruments. You will be able to perform your best drum moves for some occasions without buying one</p>
          <p><a class="btn btn-default" href="catalog.php#Percussion" role="button">View catalog &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <a href="catalog.php#Wind" class="circle_area"><?php echo img("sc2.jpg", "img-circle center-block", "Starcraft 2 image")?></a>
          <h2>Wind Instruments</h2>
          <p class="justify">Our wind instruments are waiting for you, even if your have not a strong breath. Just try it and you will maybe find a new passion</p>
          <p><a class="btn btn-default" href="catalog.php#Wind" role="button">View catalog &raquo;</a></p>
        </div>
      </div>
      </div>
<!-- end container -->
</div>
<!-- end main -->

</body>
</html>