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
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

	function __construct(){
	  	parent::__construct();
	  	$this->load->model('event');
	}

  	function index($id){
      $header = array(
          'title' => 'Blitz - Event Page',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
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