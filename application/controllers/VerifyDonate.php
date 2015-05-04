<?php
class VerifyDonate extends CI_Controller {

    protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('donation', 0),
    array('rangeslider', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Pacifico', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('rangeslider.min', 0),
    array('bootstrap', 0),
    array('ct-navbar', 0),
    array('donation', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );

   function __construct()
    {
      parent::__construct();
      $this->load->model('user');
      $this->load->model('event');
      $this->load->model('transaction');
    }

    public function number_validation($str) {
        if (preg_match("/([0-9]{4}[ -]?){4}/", $str) === 0)
        {
            $this->form_validation->set_message('number_validation', 'Your card number is invalid. Please verify and try again.');
            return false;
        }
        else
            return true;
    }

    public function date_validation($str) {
        $month = (int) substr($str, 0, 2);
        $year = (int) substr($str, 3, 2);
        $date = $month . "/" . "20" . $year;
        $d = DateTime::createFromFormat('m/Y', $date);
        if (!$d || $d->format('m/Y') != $date)
        {
            $this->form_validation->set_message('date_validation', 'Your date is invalid. Please verify and try again.');
            return false;
        }
        else
            return true;
    }


    function index() {
        $header = array(
          'title' => 'Blitz - Donation',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cardType', 'cardType', 'required',
            array('required' => 'You have not chosen a card type. Please select one.')
        );
        $this->form_validation->set_rules('name', 'name', 'required|xss_clean',
            array('required' => 'Your %s is not valid. Please type the name written on your card.')
        );
        $this->form_validation->set_rules('number', 'number', 'trim|required|callback_number_validation',
            array('required' => 'Your card number is invalid. Please verify and try again.',
                  'number_validation =>' => 'test')
        );
        $this->form_validation->set_rules('crypto', 'crypto', 'trim|required|min_length[3]|max_length[3]',
            array('required' => 'Your cryptogram number is invalid. Please verify and try again.')
        );
        $this->form_validation->set_rules('date', 'date', 'trim|required|callback_date_validation',
            array('required' => 'Your date is invalid. Please verify and try again.')
        );

        if ($this->form_validation->run() == TRUE)
        {
            if (isset($_SESSION['logged_in']))
            {
                $this->transaction->donate($_SESSION['logged_in']['id'], $_POST['eventid'], $_POST['amount']);
                $this->event->fund_event($_POST['eventid'], $_POST['amount']);
                $data['success'] = true;
            }
        }
        else {
                    $data['success'] = false;
        }
        $data['eventid'] = $_POST['eventid'];
        $data['event'] = $this->event->get_full_event($data['eventid']);
        $this->load->helper('assets');
        $this->load->view('templates/header', $header);
        $this->load->view('donate', $data);
        $this->load->view('templates/footer');
    }

    protected function get_stylesheets() {
      return $this->stylesheets;
    }

    protected function get_javascripts() {
      return $this->javascripts;
    }

}