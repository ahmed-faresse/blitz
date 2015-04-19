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

 	public function search_events() {
 		$datas = $this->input->post('datas');
 		if (!empty($datas))
 		{
 			$this->load->helper('assets');
 			if ($datas == "all")
 				$data = $this->event->get_events();
 			else 
 				$data = $this->event->search_events($datas);
 			foreach ($data as $event): 
            $str = "";
            $str .= "<div class='col-md-4'>";
            $str .= "<div class='thumbnail'>";
            $str .= img($event->image_path, "img-circle center-block", "event");;
            $str .= "<div class='caption'>";
            $str .= "<h3>" . $event->name . "</h3>";
            $str .= "<p>" . $event->short_description . "</p>";
            $str .= "<p><a href='". site_url() ."eventpage/index/". $event->id . "' class='btn btn-primary' role='button'>View more</a> <a href='#' class='btn btn-default' role='button'>Button</a></p>";
            $str .= "<p>By " . $event->username . "</p>";         
            $str .= "</div>";
            $str .= "</div>";
            $str .= "</div>";
            echo $str;
         	endforeach;
 		}
 	}

}