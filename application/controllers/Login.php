<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('login', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Pacifico', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('jquery.validate.min', 0),
    array('login', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
 	$header = array(
          'title' => 'Blitz - Login',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
 	$this->load->helper('assets');
 	$this->load->view('templates/header', $header);
    $this->load->view('login_view');
    $this->load->view('templates/footer');
 }
 
 protected function get_stylesheets() {
 	return $this->stylesheets;
 }

 protected function get_javascripts() {
 	return $this->javascripts;
 }
}
 
?>