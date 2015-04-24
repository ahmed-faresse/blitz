<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <? foreach($stylesheets as $stylesheet): ?>
        <?= css_url($stylesheet[0], $stylesheet[1]); ?>    
    <? endforeach; ?>
    <? foreach($javascripts as $javascript): ?>
        <?= js_url($javascript[0], $javascript[1]); ?>
    <? endforeach; ?>
</head>

    <body>
        <div id="navbar-full">
            <div id="navbar">
                <nav class="navbar navbar-ct-blue navbar-fixed-top <? if (strcmp($this->router->fetch_class(), "home") === 0)
                echo 'navbar-transparent' ;?> " role="navigation">

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
                                    </ul>
                                </li>

                                <li>
                                    <a href="home/logout">
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
         <? if (strcmp($this->router->fetch_class(), "home") !== 0)
                echo '</div>' ;?> 
