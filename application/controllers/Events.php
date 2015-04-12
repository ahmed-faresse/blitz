<?php
class Events extends CI_Controller{

	function __construct(){
	  	parent::__construct();
	  	$this->load->model('event');
	}


  	function index(){
  		$data['event_list'] = $this->event->get_events();

		$this->load->helper('assets');
		$this->load->view('events', $data);
		
	}

  	function logout() {
  		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('Events', 'refresh');
 	}

}