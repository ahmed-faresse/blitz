<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

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
   $this->load->model('user');
 }

 function index()
 {
   $header = array(
          'title' => 'Blitz - Login',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
   $this->load->helper('assets');
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username','xss_clean|required|trim');
   $this->form_validation->set_rules('password', 'Password','trim|xss_clean|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
      $this->load->view('templates/header', $header);
      $this->load->view('login_view');
      $this->load->view('templates/footer');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

  protected function get_stylesheets() {
      return $this->stylesheets;
  }

  protected function get_javascripts() {
      return $this->javascripts;
  }
}
?>