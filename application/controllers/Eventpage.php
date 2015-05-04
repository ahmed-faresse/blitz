<?php
class Eventpage extends CI_Controller{
  protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('eventpage', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Grand+Hotel', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('eventpage', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

	function __construct(){
	  	parent::__construct();
	  	$this->load->model('event');
      $this->load->model('registration');
      $this->load->model('comment');
	}

  public function add_comment(){
    $comment = $this->input->post('comment');
    $id = $this->input->post('id');

    $event = $this->event->get_full_event($id);
    $data=array(
      'postID'=>$id,
      'userID'=>$this->session->userdata('logged_in')['id'],
      'comment'=>$comment
      );
    $this->comment->add_comment($data);
    $comments = $this->comment->get_comments($id);

    $str = '<h2>Comments</h2>';
    if (count($comments) > 0)
    {
      foreach($comments as $row)
      {
        $name = $row['username'];
        if ($row['userID'] == $_SESSION['logged_in']['id'])
          $name = $name . " (you)";
        else if ($event->author_id == $row['userID'])
          $name = $name . " (Organizer of this event)";

        $str .= "<p><strong>" . $name . "</strong> said at " . date('F d, Y h:i A', strtotime($row['date_added'])) . "<br />" . $row['comment'] . "</p><hr/>";
      }
    }
    else
      $str .= '<p>There is currently no comment.</p>';
    $str .= '<div class="form-group col-md-6 col-md-offset-3">';
    if (isset($_SESSION['logged_in']))
    {
      $str .= '<label for="comment" class="sr-only"></label>';
      $str .= '<textarea name="comment" id="comment" class="form-control" rows="10"></textarea>';
      $str .= '<button id="commentButton" class="btn btn-primary">Add new comment</button>';
      $str .= '<p class="sr-only" id="eventID">' . $id . '</p>';
    }
    else
      $str .= '<a href="'. base_url() . 'login" class="btn btn-default" role="button"><i class="fa fa-sign-in"></i> Login to comment</a>';
    $str .= '</div>';
    echo $str;
  }

  public function add_player($id)
  {
    if ($this->session->userdata('logged_in') && $this->event->increment_user($id) === true)
    {
      $session_data = $this->session->userdata('logged_in');
      $this->registration->add_player_to_event($id, $session_data['id']);
    }
    redirect('eventpage/index/'. $id, 'refresh');
  }

  public function remove_player($id)
  {
    if ($this->session->userdata('logged_in') && $this->event->decrement_user($id) === true)
    {
      $session_data = $this->session->userdata('logged_in');
      $this->registration->unregister_player($id, $session_data['id']);
    }
    redirect('eventpage/index/' . $id, 'refresh');
  }

  function index($id){
      $header = array(
          'title' => 'Blitz - Event Page',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
      if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');
       $data['event_registered'] = $this->registration->get_events_registered($session_data['id']);
      }
      $data['event'] = $this->event->get_full_event($id);
      $this->load->library('googlemaps');
      $config['apikey'] = 'AIzaSyDAlpwQTVFTeyESt8wUFqhp-DaeFMTxhV8';
      $config['map_width'] = '70%';
      $config['map_height'] = '500px';
      $config['center'] = $data['event']->place;
      $this->googlemaps->initialize($config);
      $marker = array();
      $marker['position'] = $data['event']->place;
      $marker['title'] = $data['event']->place;
      $this->googlemaps->add_marker($marker);
      $data['map'] = $this->googlemaps->create_map();
      //Comment area
      $data['comments'] = $this->comment->get_comments($id);
  		$this->load->helper('assets');
      $this->load->view('templates/header', $header);
  		$this->load->view('eventpage', $data);
		  $this->load->view('templates/footer');
	}

  	function logout($id) {
  		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		$this->index($id);
 	}

  protected function get_stylesheets() {
      return $this->stylesheets;
  }

  protected function get_javascripts() {
      return $this->javascripts;
  }
}