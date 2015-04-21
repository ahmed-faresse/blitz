<?php

class Contact extends CI_Controller {

    function index(){

        $header["title"] = "Blitz - Contact us";

        $data['success'] = false;
        $data['email'] = "";
        $data['message'] = "";

        $this->load->helper('assets');
        $this->load->view('templates/header', $header);
        $this->load->view('contact', $data);
        $this->load->view('templates/footer');
    }

}