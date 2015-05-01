<?php
class Events extends CI_Controller{

  protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('events', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Grand+Hotel', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('http://code.jquery.com/jquery-latest.min.js', 1),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1),
    array('events', 0)
   );

	function __construct(){
	  	parent::__construct();
	  	$this->load->model('event');
      $this->load->model('registration');
	}


  	function index(){
      $header = array(
          'title' => 'Blitz - Events List',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
      if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');
       $data['id'] = $session_data['id'];
       $data['event_registered'] = $this->registration->get_events_registered($session_data['id']);
      }
  		$data['event_list'] = $this->event->get_events();
  		$this->load->helper('assets');
      $this->load->view('templates/header', $header);
      $this->load->view('events', $data);
      $this->load->view('templates/footer');	
	}

  	function logout() {
  		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('Events', 'refresh');
 	}

  public function add_player()
  {
    if (isset($_POST['event_id']) && $this->session->userdata('logged_in') &&
        $this->event->increment_user($_POST['event_id']) === true)
    {
      $session_data = $this->session->userdata('logged_in');
      $this->registration->add_player_to_event($_POST['event_id'], $session_data['id']);
    }
    redirect('events', 'refresh');
  }

  public function remove_player()
  {
    if (isset($_POST['event_id']) && $this->session->userdata('logged_in') &&
        $this->event->decrement_user($_POST['event_id']) === true)
    {
      $session_data = $this->session->userdata('logged_in');
      $this->registration->unregister_player($_POST['event_id'], $session_data['id']);
    }
    redirect('events', 'refresh');
  }

 	public function search_events() {
 		$datas = $this->input->post('datas');
 		if (!empty($datas))
 		{
 			$this->load->helper('assets');
 			if ($datas == "all")
 				$data_event = $this->event->get_events();
 			else 
 				$data_event = $this->event->search_events($datas);
      if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');
       $data['id'] = $session_data['id'];
       $data['event_registered'] = $this->registration->get_events_registered($session_data['id']);
      }
 			foreach ($data_event as $event): 
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
              if ($this->session->userdata('logged_in')['id'] == $event->author_id)
                $str .= " <a href='" . base_url() . "update/index/" . $event->id . "' class='btn btn-success' role='button'>Update</a>";
              else
              {
                $has_joined = false;
                foreach ($data['event_registered'] as $event_r):
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
            $str .= "<div class='meta'><span> <i class='fa fa-clock-o'></i>  " . date('F d, Y', strtotime($event->date)) . " </div>";
            $str .= "<div> <i class='fa fa-map-marker'></i>  " . $event->place . " </div>";
            $str .= "<div> <i class='fa fa-users'></i>  " . $event->current_people . " / " . $event->max_people . " </div>";
            if(isset($_SESSION['logged_in']) && $this->session->userdata('logged_in')['id'] == $event->author_id)
              $str .= "<div> <i class='fa fa-user'></i>  By " . $event->username . " (You)</div>";
            else
            $str .= "<div> <i class='fa fa-user'></i>  By " . $event->username . " </div>";          
            $str .= "<div> <i class='fa fa-usd'></i>  " . $event->price_funded . " / " . $event->price_asked . " </div>";
            $str .= "<progress max=" . $event->price_asked . " value=" . $event->price_funded . "></progress>"; 
            $str .= "</div>";
            $str .= "</div>";
            $str .= "</div>";
            echo $str;
          endforeach;
 		}
 	}
  protected function get_stylesheets() {
      return $this->stylesheets;
  }

  protected function get_javascripts() {
      return $this->javascripts;
  }

}