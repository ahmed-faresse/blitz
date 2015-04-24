<?php

class Verifycontact extends CI_Controller {

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

    function index() {
        $header = array(
          'title' => 'Blitz - Contact us',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );

        $data['success'] = false;
        $data['email'] = "";
        $data['message'] = "";

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email',
            array('required' => 'Your %s is not valid. Please verify and try again.')
        );
        $this->form_validation->set_rules('message', 'message', 'trim|required',
            array('required' => 'Your %s is empty. Please enter a message')
        );

        if ($this->form_validation->run() == TRUE)
        {
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "smtp.gmail.com";
            $config['smtp_port'] = "587";
            $config['smtp_user'] = "blitz.contactus";
            $config['smtp_pass'] = "Toto1234";
            $config['smtp_crypto'] = "tls"; //very important line, don't remove it
            $config['smtp_timeout'] = "5"; //google hint
            $config['mailtype'] = "text";
            $config['charset']  = "utf-8";
            $config['newline'] = "\r\n";

            $this->load->library('email', $config);

            $this->email->from($_POST['email']);
            $this->email->to('blitz.contactus@gmail.com');

            $this->email->subject('[BLITZ] Contact us');
            $this->email->message($_POST['message']);

            if ($this->email->send()) {
                $data['success'] = true;
            }
            else {
                error_log($this->email->print_debugger());
            }
        }
        else {
            $data['email'] = $_POST['email'];
            $data['message'] = $_POST['message'];
        }

        $this->load->helper('assets');
        $this->load->view('templates/header', $header);
        $this->load->view('contact', $data);
        $this->load->view('templates/footer');
    }

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

}