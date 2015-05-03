<?php
class Createevents extends CI_Controller{
  protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('eventpage', 0),
    array('default', 0),
    array('default.date', 0),
    array('default.time', 0),
    array('update', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Grand+Hotel', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('picker', 0),
    array('picker.date', 0), 
    array('picker.time', 0),
    array('legacy', 0),
    array('update', 0),
    array('ct-navbar', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

	function __construct(){
	  	parent::__construct();
  	  	$this->load->model('event');
	}

  function index(){
  if ($this->session->userdata('logged_in')){
      $header = array(
          'title' => 'Blitz - Create Event',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
      $this->load->helper('assets');
      $this->load->view('templates/header', $header);
      $this->load->view('createevent_view');
      $this->load->view('templates/footer');
	}else
      header("HTTP/1.1 403 Unauthorized" );
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