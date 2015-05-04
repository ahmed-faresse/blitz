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
        $this->load->model('registration');
        $this->load->model('event');
    }

    function index(){

        $this->load->helper('assets');
        $this->load->library('form_validation');

        $header = array(
            'title' => 'Blitz - My Account',
            'stylesheets' => $this->get_stylesheets(),
            'javascripts' => $this->get_javascripts()
        );

        $data['success'] = false;
        $data['userInformation'] = false;
        $data['transactions'] = false;
        $data['eventTransactions'] = false;
        $data['registrations'] = false;
        $data['eventRegistrations'] = false;
        $data['authorEvent'] = false;

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');

            $this->form_validation->set_rules('password', 'password','trim|xss_clean|required|callback_check_database',
                array('required' => 'Your %s is not valid. Please verify and try again.'));
            $this->form_validation->set_rules('newpassword', 'new password','trim|xss_clean|required',
                array('required' => 'Your %s is empty. Please enter a new password.'));
            $this->form_validation->set_rules('confirmnewpassword', 'confirmation of new password','trim|xss_clean|required|callback_isConfirmPasswordCorrect',
                array('required' => 'Your %s is empty. Please confirm your password.'));

            if ($this->form_validation->run() == TRUE)
            {
                $data['success'] = true;
                $this->user->changePassword($session_data['id'], MD5($this->input->post('newpassword')));
            }

            $user = $this->user->getUserInformation($session_data['username']);
            $data['userInformation'] = $user[0];

            $transactions = $this->transaction->getTransactions($session_data['id'], 10);
            $i = 0;
            foreach($transactions as $transaction) {
                $data["eventTransactions"][$i] = $this->event->get_full_event($transaction->event_id);
                $i++;
            }
            $data['transactions'] = $transactions;

            $registrations = $this->registration->get_events_registered($session_data['id']);
            $i = 0;
            foreach($registrations as $registration) {
                $data["eventRegistrations"][$i] = $this->event->get_full_event($registration->event_id);
                $i++;
            }
            $data['authorEvent'] = $this->event->get_authored_event($session_data['id']);
            $data['registrations'] = $registrations;
            $this->load->helper('assets');
            $this->load->view('templates/header', $header);
            $this->load->view('account', $data);
            $this->load->view('templates/footer');
        }else
          header("HTTP/1.1 403 Unauthorized" );
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('Account', 'refresh');
    }

    function remove_event($id)
    {
        if ($this->session->userdata('logged_in'))
        {
            if ($id != null)
              $this->event->remove_event($id);
        }
        redirect('account', 'refresh');
    }

    public function remove_player($id)
    {
        if ($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->registration->unregister_player($id, $session_data['id']);
        }
        redirect('account', 'refresh');
    }

    function check_database($password)
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');

            if ($this->isPasswordCorrect($session_data['username'], $password) == false) {
                $this->form_validation->set_message('check_database','Your password is incorrect.');
                return false;
            }

            return true;
        }

        return false;
    }

    private function isPasswordCorrect($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $query = $this->db->get('users');

        if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
    }

    function isConfirmPasswordCorrect($password)
    {
        if ($password != $this->input->post('newpassword')) {
            $this->form_validation->set_message('isConfirmPasswordCorrect','Your confirmation for your new password is not the same than your new password.');
            return false;
        }

        return true;
    }

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

}