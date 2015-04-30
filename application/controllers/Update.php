<?php
class Update extends CI_Controller{
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

	function index($id){
      $header = array(
          'title' => 'Blitz - Events List',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
        
      $data['event'] = $this->event->get_full_event($id);
      $data['title'] = $data['event']->name;
      $data['price'] = $data['event']->price_asked;
      $data['description'] = $data['event']->description;
      $data["place"] = $data['event']->place;
      $data["date"] = date('d F, Y', strtotime($data['event']->date));
      $data["time"] = date('h:iA', strtotime($data['event']->date));

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
	    $this->load->view('update', $data);
	    $this->load->view('templates/footer');	
	}

  function validate($id)
  {
    $header = array(
          'title' => 'Blitz - Events List',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
    $this->load->library('form_validation');
    $data['event'] = $this->event->get_full_event($id);

    $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean',
            array('required' => 'Your title is empty. Please verify and try again.')
        );

    $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean',
            array('required' => 'Your description is empty. Please verify and try again.')
        );

    $this->form_validation->set_rules('place', 'place', 'trim|required|xss_clean',
            array('required' => 'Your place is empty. Please verify and try again.')
        );

    $this->form_validation->set_rules('date', 'date', 'required|xss_clean',
            array('required' => 'Your date is empty. Please verify and try again.')
        );

    $this->form_validation->set_rules('time', 'time', 'required|xss_clean',
            array('required' => 'Your time is empty. Please verify and try again.')
        );

    $this->form_validation->set_rules('price', 'price', 'trim|required|numeric|greater_than[' . strval(intval($data['event']->price_funded) - 1) .']',
            array('required' => 'Your price is invalid. Please verify and try again.')
        );
    
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

    if ($this->form_validation->run() == TRUE)
    {
      $this->event->update_event($id, $_POST['title'], $_POST['description'], $_POST['price'],
                                 $_POST['place'], $_POST['date'], $_POST['time']);
     // echo date('d F, Y h:iA', strtotime($_POST['date'] . " " . $_POST['time']));
      echo date("Y-m-d H:i:s", $_POST['date'] . " " . $_POST['time']);
      $data['title'] = $_POST['title'];
      $data['price'] = $_POST['price'];
      $data['description'] = $_POST['description'];
      $data['place'] = $_POST['place'];
      $data['date'] = $_POST['date'];
      $data['time'] = $_POST['time'];
    }
    else
    {
      $data['title'] = $_POST['title'];
      $data['price'] = $_POST['price'];
      $data['description'] = $_POST['description'];
      $data['place'] = $_POST['place'];
      $data['date'] = $_POST['date'];
      $data['time'] = $_POST['time'];
    }
    $this->load->view('templates/header', $header);
    $this->load->view('update', $data);
    $this->load->view('templates/footer');
  }

	protected function get_stylesheets() {
      return $this->stylesheets;
    }

    protected function get_javascripts() {
      return $this->javascripts;
    }
}