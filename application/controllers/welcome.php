<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
		 	'title' => 'iCalendarにようこそ',
		 	'note' => 'iCalendarにようこそ'
            );

		$this->load->model('tbl_calendar_model');
		$this->load->model('tbl_ymd_model');

		// $this->load->view('welcome_message');
		//
		// $this->load->model('tbl_ymd');
		// $this->input->post('title');
		$this->load->view('include/header',$data);
		$this->load->view('include/footer',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */