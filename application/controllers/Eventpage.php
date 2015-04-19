<?php
class Eventpage extends CI_Controller{

	function __construct(){
	  	parent::__construct();
	  	$this->load->model('event');
	}

  	function index($id){
  		$data['event'] = $this->event->get_full_event($id);
  		$this->load->helper('assets');
  		$this->load->view('eventpage', $data);
		
	}

  	function logout($id) {
  		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		$this->index($id);
 	}
}