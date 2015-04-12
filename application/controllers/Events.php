<?php
class Events extends CI_Controller{
  function index(){
		$this->load->helper('assets');
		$this->load->view('events');
	}
  function logout() {
  		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('Events', 'refresh');
 }

}