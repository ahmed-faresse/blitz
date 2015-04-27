<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

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
    array('register', 0),
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
          'title' => 'Blitz - Register',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
   $this->load->helper('assets');
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email','email','xss_clean|required|trim|valid_email');
   $this->form_validation->set_rules('username', 'username','xss_clean|required|trim');
   $this->form_validation->set_rules('password', 'password','trim|xss_clean|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('templates/header', $header);
     $this->load->view('register_view');
     $this->load->view('templates/footer');   
   }
   else
   {
     //Go to private area
      $message = "You have been successfully registered";
      $data["message"] = $message;
      $this->load->view('templates/header', $header);
      $this->load->view('login_view', $data);   
      $this->load->view('templates/footer');   
   
      //redirect('login', 'refresh',$data);
   }
 }

private function email_exists($email)
{
  $this->db->where('email', $email);
  $query = $this->db->get('users');
  if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
}

private function username_exists($username)
{
  $this->db->where('username', $username);
  $query = $this->db->get('users');
  if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
}

private function send_mail($email,$username){
        if (valid_email($email)){
          $to = $email;
          $subject = "Welcom to Blitz";
          $message="
           <html>
           <body>
            <p>Hi ".$username.",</p>
            <h3>Welcome to Blitz</h3>
            <p>Thank you so much for registering with Blitz !</p>
            <a href='http://blitz.besaba.com/home'>Create your event now !</a>
          </body>
          </html>
          ";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: <ahmed.faresse@gmail.com>' . "\r\n";
          $check_mail = mail($to,$subject,$message,$headers);
  }
}

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $email = $this->input->post('email');

   //query the database
   if ($this->email_exists($email) == TRUE){
      $this->form_validation->set_message('check_database', 'This email exist');
      return false;
   }
   else if ($this->username_exists($username) == TRUE){
    $this->form_validation->set_message('check_database','This username exist');
    return false;
   }
   else{
        $result = $this->user->register($email, $username, $password);
        $this->send_mail($email,$username);
        return true;
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