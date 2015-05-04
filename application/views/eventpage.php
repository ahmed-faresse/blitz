<div class="container main">
  <div class='row image'>
    <div class='col-md-12'>
      <?php echo img($event->image_large_path, "center-block", "event"); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h1><?php echo $event->name; ?></h1>
      <h4>( <i class="fa fa-users"></i> <?php echo $event->current_people . "/" . $event->max_people;?> )</h4>
    </div>
  </div>
   <div class="row margin">
    <div class="col-md-12">
      <p>$<?php echo "$event->price_funded";?> / $<?php echo "$event->price_asked";?></p>
      <progress max=<?php echo "$event->price_asked";?> value=<?php echo "$event->price_funded";?>></progress>
    </div>
  </div>
  <div class="row margin">
  <? if(isset($_SESSION['logged_in']))
    {
        echo '<div class="col-md-3 col-md-offset-3 btn-group">';
        if ($_SESSION['logged_in']['id'] == $event->author_id)
          echo '<a href="'. base_url() . 'update/index/' . $event->id . '" class="btn btn-info" role="button"><i class="fa fa-refresh fa-spin"></i> Update</a>';
        else
        {
          $has_joined = false;
          foreach ($event_registered as $event_r):
          if ($event_r->event_id == $event->id)
            $has_joined = true;
          endforeach;
          if ($has_joined === false)
            echo '<a href="'. base_url() . 'eventpage/add_player/' . $event->id . '" class="btn btn-info" role="button"><i class="fa fa-plus-circle"></i> Join Event</a>';
          else
            echo '<a href="'. base_url() . 'eventpage/remove_player/' . $event->id . '" class="btn btn-danger" role="button"><i class="fa fa-minus-circle"></i> Unregister</a>';     
        }
        echo '</div>';
        echo '<div class="col-md-3 btn-group">';
        echo '<a href="' . base_url() . 'donate/index/' . $event->id . '" class="btn btn-success" role="button"><i class="fa fa-usd"></i> Donate</a>';
        echo '</div>';
    }
    else
    {
      echo '<div class="col-md-6 col-md-offset-3 btn-group">';
      echo '<a href="'. base_url() . 'login" class="btn btn-default" role="button"><i class="fa fa-sign-in"></i> Login to join, update or donate</a>';
      echo '</div>';
    }
    ?>
  </div> 
  <div class="row margin">
    <div class="col-md-10 col-md-offset-1">
      <p class="description"> <?php echo $event->description; ?></p>
    </div>
  </div>
  <div class="row margin">
    <div class="col-md-3 col-md-offset-2 date">
      <i class="fa fa-map-marker"></i>
      <p><?php echo $event->place; ?></p>
    </div>
    <div class="col-md-3 col-md-offset-2 place">
      <i class="fa fa-clock-o"></i>
      <p><?php echo date('d F, Y<\b\\r>h:iA', strtotime($event->date)) ; ?></p>
    </div>
  </div>
  <div class="row margin">
      <?php echo $map['html']; ?>
  </div>
  <hr/>
  <div class="row margin">
  <div id="comments" class="col-md-12">
    <h2>Comments</h2>
    <?
    if (count($comments) > 0)
    {
      foreach($comments as $row)
      {
        $name = $row['username'];
        if ($row['userID'] == $_SESSION['logged_in']['id'])
          $name = $name . " (you)";
        else if ($event->author_id == $row['userID'])
          $name = $name . " (Organizer of this event)";

        echo "<p><strong>" . $name . "</strong> said at " . date('F d, Y h:i A', strtotime($row['date_added'])) . "<br />" . $row['comment'] . "</p><hr/>";
      }
    }
    else
      echo '<p>There is currently no comment.</p>';
    ?>
    <div class="form-group col-md-6 col-md-offset-3">
      <? if (isset($_SESSION['logged_in']))
      {
        echo '<label for="comment" class="sr-only"></label>';
        echo '<textarea name="comment" id="comment" class="form-control" rows="10"></textarea>';
        echo '<button id="commentButton" class="btn btn-primary">Add new comment</button>';
        echo '<p class="sr-only" id="eventID">' . $event->id . '</p>';
      }
      else
        echo '<a href="'. base_url() . 'login" class="btn btn-default" role="button"><i class="fa fa-sign-in"></i> Login to comment</a>';
      ?>
    </div>
  </div>
  </div>
</div>

<?php echo $map['js']; ?>