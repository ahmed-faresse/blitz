<?php
class Verifycreateevent extends CI_Controller{
 protected $stylesheets = array(
    array('bootstrap', 0),
    array('pe-icon-7-stroke', 0),
    array('ct-navbar', 0),
    array('eventpage', 0),
    array('default', 0),
    array('default.date', 0),
    array('default.time', 0),
    array('update', 0),
    array('http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', 1),
    array('http://fonts.googleapis.com/css?family=Grand+Hotel', 1)
   );
   protected $javascripts = array(
    array('jquery-1.10.2', 0),
    array('bootstrap', 0),
    array('picker', 0),
    array('picker.date', 0), 
    array('picker.time', 0),
    array('legacy', 0),
    array('update', 0),
    array('ct-navbar', 0),
    array('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', 1)
   );


	function __construct(){
	  	parent::__construct();
	  	$this->load->model('event');
	}

	function index(){
		 $header = array(
          'title' => 'Blitz - Create Events',
          'stylesheets' => $this->get_stylesheets(),
          'javascripts' => $this->get_javascripts()
        );

	$this->load->helper('assets');
   	//This method will have the credentials validation
   	$this->load->library('form_validation');

   	$this->form_validation->set_rules('name','name','xss_clean|required|trim');
   	$this->form_validation->set_rules('description', 'description','xss_clean|required|trim|min_length[50]');
   	$this->form_validation->set_rules('short_description', 'short_description','trim|xss_clean|required|min_length[50]
');
   	$this->form_validation->set_rules('place','place','trim|xss_clean|required');
   	$this->form_validation->set_rules('date','date','trim|xss_clean|required');
   	$this->form_validation->set_rules('time','time','trim|xss_clean|required');
   	$this->form_validation->set_rules('price_asked','price_asked','trim|xss_clean|required|numeric|greater_than[0]
');
   	$this->form_validation->set_rules('max_people','max_people','trim|xss_clean|required|numeric|greater_than[0]');
   	$this->form_validation->set_rules('jeu','jeu','trim|xss_clean|required');

	if($this->form_validation->run() == FALSE)
   	{
     //Field validation failed.  User redirected to login page
     $this->load->view('templates/header', $header);
     $this->load->view('createevent_view');
     $this->load->view('templates/footer');   
   }
   else
   {
     //Go to private area
   	  $this->create_the_event();
      $this->session->set_flashdata('message', "You have successfully create a new event");
      redirect('events', 'refresh');
   }
}

	function create_the_event(){
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$short_description = $this->input->post('short_description');
		$place = $this->input->post('place');
		$dat = $this->input->post('date'); 
		$tim = $this->input->post('time');
		$date = str_replace(",", "", $dat. ' ' .$tim);
		$price_asked = $this->input->post('price_asked');
		$price_funded = 0;
		$current_people = 0;
		$jeu = $this->input->post('jeu');
		$max_people = $this->input->post('max_people');
		$author_id = $this->session->userdata('logged_in')['id'];
		$image_path = $this->load_small_img($jeu);
		$image_large_path = $this->load_large_img($jeu);

		$result = $this->event->create_event($name, $description,$short_description,$place,$date,$price_asked,
			$price_funded,$current_people,$max_people,$author_id,$image_path,$image_large_path);
}

	private function load_small_img($jeu){
		switch ($jeu) {
			case 'Leagues of Legends':
				return "thumbnail_lol.jpg";
				break;
			case 'Starcraft 2':
				return "sc2.jpg";
				break;
			case 'Fifa 15':
				return 'fifa.jpg';
				break;
			default:
				return $jeu;
				break;
		}
	}

	private function load_large_img($jeu){
		switch ($jeu) {
			case 'Leagues of Legends':
				return "lol_large.png";
				break;
			case 'Starcraft 2':
				return "sc2_large.png";
				break;
			case 'Fifa 15':
				return 'fifa_large.png';
				break;
			default:
				return 'error';
				break;
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