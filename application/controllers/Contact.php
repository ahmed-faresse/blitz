<?php

class Contact extends CI_Controller {

    protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('contact', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Pacifico', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

    function index(){

        $header = array(
          'title' => 'Blitz - Contact us',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );

        $data['success'] = false;
        $data['email'] = "";
        $data['message'] = "";

        $this->load->helper('assets');
        $this->load->view('templates/header', $header);
        $this->load->view('contact', $data);
        $this->load->view('templates/footer');
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('Contact', 'refresh');
    }

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

}