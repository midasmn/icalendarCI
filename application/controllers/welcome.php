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
        // if($top=="welcome"){
        // }else{
        //     $vcnt = $this->session->userdata('vcnt');
        //     $histry_url = $this->session->userdata('histry_url');
        //     if($vcnt)
        //     {
        //         $vcnt++;
        //         $this->session->set_userdata('vcnt', $vcnt);
        //     }else{
        //         $this->session->set_userdata('vcnt', 1);
        //     }
        //     //
        //     if($vcnt>1){
        //         if($histry_url){
        //             redirect($histry_url, 'location');
        //         }else{
        //         }    
        //     }
        // }
        
		$this->session->set_flashdata('redirect_url', current_url());
        $this->session->set_userdata('histry_url', current_url());
	}


	public function index()
	{
		$userid=-1;
        $data = array();
        $data['og_title'] = 'iCalendarにようこそ - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
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
	   
        $data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
        $data['ymdcnt'] = $this->ymd->count_ymd_all();

		$this->load->view('include/header',$data);
		$this->load->view('welcome',$data);
		$this->load->view('include/footer',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */