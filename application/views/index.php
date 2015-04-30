 <div class="blurred-container">
            <div class="img-src" style="background-image: url('<?php echo img_url('bg.png')?>')"></div>
</div>
 <div class="main">
        <?php
      $message = $this->session->flashdata('message_password');
      if (isset($message)){
              echo '<p class="alert alert-success alert-dismissible" role="alert">' . $message . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p> ';
      }
      ?>
        <div class="container tim-container main-container">
        <div class="col-lg-4">
          <a href="<?php echo site_url() . 'events' ?>" class="circle_area"><?php echo img("lol.jpg", "img-circle center-block", "League of Legends image")?></a>
          <h2>League of Legends</h2>
          <p class="justify" >Fund or join the Summoner's Rift for 5 versus 5 epic fights</p>
          <p><a class="btn btn-info" href="<?php echo site_url() . 'events' ?>" role="button">View events &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <a href="<?php echo site_url() . 'events' ?>" class="circle_area"><?php echo img("fifa.jpg", "img-circle center-block", "Fifa image")?></a>
          <h2>Fifa</h2> 
          <p class="justify">Organize or participate in a Fifa tournament for crazy football matches</p>
          <p><a class="btn btn-info" href="<?php echo site_url() . 'events' ?>" role="button">View events &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <a href="<?php echo site_url() . 'events' ?>" class="circle_area"><?php echo img("sc2.jpg", "img-circle center-block", "Starcraft 2 image")?></a>
          <h2>Starcraft II</h2>
          <p class="justify">Donate or play to see some Zerg rushes in amazing Starcraft II battles</p>
          <p><a class="btn btn-info" href="<?php echo site_url() . 'events' ?>" role="button">View events &raquo;</a></p>
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