<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifyforgotpassword extends CI_Controller {

  protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('login', 0),
    array('home', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Pacifico', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('jquery.validate.min', 0),
    array('forgetpassword', 0),
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
          'title' => 'Blitz - Forgot Password',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );
   $this->load->helper('assets');
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'email','xss_clean|required|trim|callback_check_database|valid_email');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to forgotpassword page
    $this->load->view('templates/header', $header);
    $this->load->view('forgotpassword_view');
    $this->load->view('templates/footer');
   }
   else
   {
     //Go to private area
     $message = "We have sent you a new password, please check your mail box. Thank you!";
     $data["message_password"] = $message;
     $this->load->view('templates/header', $header);
     $this->load->view('index', $data);
     $this->load->view('templates/footer');
   }

 }

private function email_exists($email)
{
  $this->db->where('email', $email);
  $query = $this->db->get('users');
  if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
}

private function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

private function updatePassword($email,$newpassword){
  $data = array(
      'password' => md5($newpassword),
    );
  $this -> db -> where('email',$email);
  $this -> db -> update('users',$data);
  if($this->db->affected_rows() > 0)
    {
        return true;
    }
    else
    {
      return false;
    }
}

private function send_mail($email){
   if (valid_email($email)){
    $newpassword = $this->randomPassword();
    if ($this->updatePassword($email,$newpassword) == true){
    $to = $email;
          $subject = "Blitz: new password";
          $message="
           <html>
           <body>
            <p>You recently asked to reset your Blitz password.</p>
            <p>Please find your new password: ".$newpassword." .</p>
            <p>You'll need this every time you want to log on the website, so keep it safe and don't share it with anyone.</p>
            <p>Thank you,</p>
            <p>Blitz Support</p>
          </body>
          </html>
          ";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: <ahmed.faresse@gmail.com>' . "\r\n";
          mail($to,$subject,$message,$headers);
    }
         
        else 
        {
          echo 'Error: Send mail';
        }
  }
}

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');

   //query the database
   if ($this->email_exists($email) == false){
      $this->form_validation->set_message('check_database', 'The email account that you tried to reach does not exist');
      return false;
   }
   else{
        $result = $this->user->forgotpassword($email);
        $this->send_mail($email);
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