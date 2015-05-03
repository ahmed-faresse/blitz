<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

  protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('home', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Grand+Hotel', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('home', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $data = [];
   $header = array(
      'title' => 'Blitz - Home',
      'stylesheets' => $this->get_stylesheets(),
      'javascripts' => $this->get_javascripts()
    );
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];  
   }
   $this->load->helper('assets');
   $this->load->view('templates/header', $header);
   $this->load->view('index', $data);
   $this->load->view('templates/footer');
}

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

  protected function get_stylesheets() {
    return $this->stylesheets;
  }

  protected function get_javascripts() {
    return $this->javascripts;
  }
}

?>