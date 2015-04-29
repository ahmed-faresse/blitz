<?php

class Account extends CI_Controller {

    protected $stylesheets = array(
        array('bootstrap', 0),
        array('pe-icon-7-stroke', 0),
        array('ct-navbar', 0),
        array('account', 0),
        array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
        array('http://fonts.googleapis.com/css?family=Pacifico', 1)
    );
    
    protected $javascripts = array(
        array('jquery-1.10.2', 0),
        array('bootstrap', 0),
        array('ct-navbar', 0),
        array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
    );

    function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->model('transaction');
    }

    function index(){

        $header = array(
            'title' => 'Blitz - My Account',
            'stylesheets' => $this->get_stylesheets(),
            'javascripts' => $this->get_javascripts()
        );

        $data['success'] = false;
        $data['userInformation'] = false;
        $data['transactions'] = false;

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $user = $this->user->getUserInformation($session_data['username']);
            $data['userInformation'] = $user[0];
            $data['transactions'] = $this->transaction->getTransactions($session_data['id'], 10);
        }

        $this->load->helper('assets');
        $this->load->view('templates/header', $header);
        $this->load->view('account', $data);
        $this->load->view('templates/footer');
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('Account', 'refresh');
    }

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

}