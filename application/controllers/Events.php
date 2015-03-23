<?php
class Events extends CI_Controller{
  function index(){
		$this->load->helper('assets');
		$this->load->view('events');
	}
  }