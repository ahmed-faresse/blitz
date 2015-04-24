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
	}


  	function index(){
      $header = array(
          'title' => 'Blitz - Events List',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
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
            $str .= "<div class='element'>";
            $str .= img($event->image_path, "img-circle center-block", "event");;
            $str .= "<div class='infos'>";
            $str .= "<h3>" . $event->name . "</h3>";
            $str .= "<p>" . $event->short_description . "</p>";
            $str .= "<p><a href='". base_url() . "eventpage/index/". $event->id . "' class='btn btn-primary' role='button'>View more</a> <a href='". base_url() . "donate/index/" . $event->id . "' class='btn btn-default' role='button'>Donate</a></p>";
            $str .= "<p>By " . $event->username . "</p>";     
            $str .= "<p>$". $event->price_funded . " / $ " . $event->price_asked . "</p>";
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