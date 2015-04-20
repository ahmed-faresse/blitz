<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blitz Login Page</title>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo css_url("bootstrap")?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo css_url("pe-icon-7-stroke")?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo css_url("ct-navbar")?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo css_url("login")?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo js_url("jquery.min")?>" type="text/javascript" defer></script>
    <script src="<?php echo js_url("bootstrap")?>" type="text/javascript" defer></script>
    <script src="<?php echo js_url("ct-navbar")?>" type="text/javascript" defer></script>
    <script src="<?php echo js_url("jquery.validate.min")?>" type="text/javascript" defer></script>
    <script src="<?php echo js_url("login")?>" type="text/javascript" defer></script> 

  </head>

  <header>
    </header>
  
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
                            <a href="events/logout">
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
    </div><!--  end navbar -->

  <div class="container">
    <div class="login-form">
      <h1 class="text-center">Log in to Blitz</h1>
      <div class="form-header">
        <em class="fa fa-user"></em>
      </div>
      <?php echo validation_errors(); ?>
      <?php echo form_open('verifylogin', array('class' => 'form-signin')); ?>
        <label for="username">Username</label>
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
        <button class="btn btn-block bt-login" type="submit">Sign in</button>
      </form>
      <div class="form-footer">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-lock"></em>
             <a href="<?php echo site_url() . 'forgotpassword' ?>">Forgot password</a>          
          </div>
          
          <div class="col-xs-6 col-sm-6 col-md-6">
            <em class="fa fa-check"></em>
            <a href="<?php echo site_url() . 'register' ?>"> Sign Up </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>