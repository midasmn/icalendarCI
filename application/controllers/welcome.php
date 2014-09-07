<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		// $this->output->enable_profiler(TRUE);
		$this->session->set_flashdata('redirect_url', current_url());
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
		$userid=-1;
        $data = array();
        $data = array(
		 	'title' => 'iCalendarにようこそ',
		 	'note' => 'iCalendarにようこそ'
            );
        // ログインセッション
        if($this->session->userdata("is_logged_in")){   //ログインしている場合の処理
            $email=$this->session->userdata("email");
            $userid=$this->session->userdata("userid");
            $status=$this->session->userdata("status");
            $profile_img=$this->session->userdata("profile_img");
            $remember=$this->session->userdata("remember");
            //
            $data['email'] = $email;
            $data['userid'] = $userid;
            $data['status'] = $status;
            $data['profile_img'] = $profile_img;
            $data['remember'] = $remember;
        }
        // ログインセッション

		$exm=$this->uri->segment(1);  
		/////// ログ
        $this->load->model('tbl_log_model', 'logr'); //ログ
        $logdata = array(  'userid' => $userid,'item1' => $exm );
        $rtn = $this->logr->insert($logdata);
        /////// ログ

		$this->load->model('tbl_calendar_model','calendar');
		$this->load->model('tbl_ymd_model');

		//メニューお気に入りセレクト
		if($userid<>-1){
			$data['menu'] = $this->calendar->menu_favorites_arr($userid);
		}
		//メニューお気に入りセレクト
		

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