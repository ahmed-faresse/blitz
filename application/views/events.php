<div class="container main">
      <div class="row">
        <div class="col-md-12">
          <label for="searchfilter" class="sr-only">Search</label>
          <select id="searchfilter" name="searchfilter" class="filter-event">
            <option value="all">No filter</option>
            <option value="thumbnail_lol.jpg">League of Legends</option>
            <option value="sc2.jpg">Starcraft II</option>
            <option value="fifa.jpg">Fifa 15</option>
          </select>
            <a class="search button fa tick"></a>
        </div>
      </div>
    	<div class='events row'>
        <div class='col-md-4'>
          <div class="add">
            <div class="add-content">
              <div id="circle"></div>
              <p>Create an event</p>
              <? if (isset($_SESSION['logged_in']))
                echo '<a href="' . base_url() . 'createevents"><em class="fa fa-plus"></em></a>';
                else
                echo '<a href="' . base_url() . 'login"><em class="fa fa-plus"></em></a>';
              ?>
            </div>
          </div>
        </div>
          <?php
          foreach ($event_list as $event): 
            $str = "";
            $str .= "<div class='col-md-4'>";
            $str .= "<div class='element'>";
            $str .= img($event->image_path, "img-circle center-block", "event");;
            $str .= "<div class='infos'>";
            $str .= "<h3>" . $event->name . "</h3>";
            $str .= "<p>" . $event->short_description . "</p>";
            $str .= "<div class='buttons'><a href='". base_url() . "eventpage/index/". $event->id . "' class='btn btn-primary' role='button'>View more</a>"; 
            if(isset($_SESSION['logged_in']))
            {
              $str .= " <a href='". base_url() . "donate/index/" . $event->id . "' class='btn btn-default' role='button'>Donate</a>";
              if ($id == $event->author_id)
                $str .= " <a href='" . base_url() . "update/index/" . $event->id . "' class='btn btn-success' role='button'>Update</a>";
              else
              {
                $has_joined = false;
                foreach ($event_registered as $event_r):
                 if ($event_r->event_id == $event->id)
                  $has_joined = true;
                endforeach;
                if ($has_joined === false)
                {
                  $str .= ' <form id="join" action="events/add_player" method="post">';
                  $str .= '<label class="sr-only" for="event_id">Join event</label>';
                  $str .= '<input class="sr-only" type="text" name="event_id" id="event_id" value="' . $event->id . '" />';
                  $str .= "<button type='submit' class='btn btn-primary'>Join event</button>";
                  $str .= '</form>';
                }
                else
                {
                  $str .= ' <form id="join" action="events/remove_player" method="post">';
                  $str .= '<label class="sr-only" for="event_id">Join event</label>';
                  $str .= '<input class="sr-only" type="text" name="event_id" id="event_id" value="' . $event->id . '" />';
                  $str .= "<button type='submit' class='btn btn-danger'>Unregister</button>";
                  $str .= '</form>';
                }
              }
            }
            else
              $str .= " <a href='". base_url() . "login' class='btn btn-default' role='button'>Login to donate/participate</a>";
            $str .= "</div>";
            $str .= "<div class='meta'><span> <em class='fa fa-clock-o'></em>  " . date('F d, Y', strtotime($event->date)) . " </span></div>";
            $str .= "<div> <em class='fa fa-map-marker'></em>  " . $event->place . " </div>";
            $str .= "<div> <em class='fa fa-users'></em>  " . $event->current_people . " / " . $event->max_people . " </div>";
            if(isset($_SESSION['logged_in']) && $id == $event->author_id)
              $str .= "<div> <em class='fa fa-user'></em>  By " . $event->username . " (You)</div>";
            else
            $str .= "<div> <em class='fa fa-user'></em>  By " . $event->username . " </div>";          
            $str .= "<div> <em class='fa fa-usd'></em>  " . $event->price_funded . " / " . $event->price_asked . " </div>";
            $str .= "<progress max=" . $event->price_asked . " value=" . $event->price_funded . "></progress>"; 
            $str .= "</div>";
            $str .= "</div>";
            $str .= "</div>";
            echo $str;
          endforeach
          ?>
          </div>
</div>