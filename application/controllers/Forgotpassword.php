<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Forgotpassword extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
 	$this->load->helper('assets');
    $this->load->view('forgotpassword_view');
 }
 
}
 
?>