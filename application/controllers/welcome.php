<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->config->load('icalendar');
        $this->load->library('session');
		// $this->output->enable_profiler(TRUE);
        $top=$this->uri->segment(1);  
        
		$this->session->set_flashdata('redirect_url', current_url());
        $this->session->set_userdata('histry_url', current_url());
	}


	public function index()
	{
		$userid=-1;
        $data = array();
        $data['og_title'] = 'インテリカレンダーにようこそ - インテリカレンダー';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');

		$exm=$this->uri->segment(1);  
		/////// ログ
        $this->load->model('tbl_logs_model', 'logr'); //ログ
        $logdata = array(  'userid' => $userid,'exm' => 'welcome' );
        $rtn = $this->logr->insert($logdata);
        /////// ログ

		$this->load->model('tbl_calendar_model','calendar');
		$this->load->model('tbl_ymd_model','ymd');

		//メニューお気に入りセレクト
		if($userid<>-1){
			$data['menu'] = $this->calendar->menu_favorites_arr($userid);
		}
		// ogタグ初期値
        $data['og_image'] = "http://icalendar.xyz/application/img/main.jpg" ;
        // ogタグ
	   
        // 登録件数
        $this->load->model('tbl_count_model', 'count');  
        $data['day_cnt'] = $this->count->get_count();

		$this->load->view('include/header',$data);
		$this->load->view('welcome',$data);
		$this->load->view('include/footer',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */