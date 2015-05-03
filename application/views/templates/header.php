<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <? foreach($stylesheets as $stylesheet):
        echo css_url($stylesheet[0], $stylesheet[1]);   
    endforeach;
    echo css_url('footer', 0);
    foreach($javascripts as $javascript):
        echo js_url($javascript[0], $javascript[1]);
    endforeach;
    echo js_url('url', 0); ?>
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
                                    <? echo img("blitz_logo.png", "", "blitz logo") ?>
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
                                    <?php if(isset($_SESSION['logged_in']))
                                    {
                                        echo '<a href="'. site_url() . 'account/">
                                            <i class="pe-7s-user"></i>
                                            <p>Account</p>
                                        </a>                              
                                </li>
                                <li>
                                    <a href="'. site_url() . 'home/logout/">
                                        <i class="pe-7s-power"></i>
                                        <p>Log out</p>
                                    </a>';
                                }
                                else
                                {
                                    echo '<a href="'. site_url() . 'login">
                                    <i class="pe-7s-key"></i>
                                    <p>Log in</p>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="register">
                                        <i class="pe-7s-add-user"></i>
                                        <p>Register</p>
                                    </a>';
                                }
                                ?>
                             </li>
                             <li>
                                <a href= <? echo site_url() . "contact";?>>
                                    <i class="pe-7s-mail"></i>
                                    <p>Contact</p>
                                </a>
                             </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->

                </div><!-- /.container-fluid -->
            </nav>
         </div><!--  end navbar -->
         <? if (strcmp($this->router->fetch_class(), "home") !== 0)
                echo '</div>' ;?> 
