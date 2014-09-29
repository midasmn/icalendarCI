<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staticpages extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        // $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        $this->load->library('session');
	}

	public function about()
	{
		$userid=-1;
        $data = array();
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
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
        //staticDB
        $this->load->model('tbl_static_model', 'static');
        $data['description'] = $this->static->get_description('about');
        //staticDB
	 	$data['title'] = 'iCalendarついて';

		$this->load->view('include/header',$data);
		$this->load->view('about',$data);
		$this->load->view('include/footer',$data);
	}
	public function terms()
	{
		$userid=-1;
        $data = array();
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
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
        //staticDB
        $this->load->model('tbl_static_model', 'static');
        $data['description'] = $this->static->get_description('terms');
        //staticDB
		$data['title'] = '利用規約';

		$this->load->view('include/header',$data);
		$this->load->view('terms',$data);

		$this->load->view('include/footer',$data);
	}
	public function privacy()
	{
		$userid=-1;
        $data = array();
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
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
        //staticDB
        $this->load->model('tbl_static_model', 'static');
        $data['description'] = $this->static->get_description('privacy');
        //staticDB
		$data['title'] = 'プライバシーポリシー';
	 
		$this->load->view('include/header',$data);
		$this->load->view('privacy',$data);
		$this->load->view('include/footer',$data);
	}
	public function faq()
	{
		$userid=-1;
        $data = array();
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
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
		$data['title'] = 'FAQ';
	 	$data['note'] =  'よくある質問(FAQ)';

		$this->load->model('tbl_faq_model', 'faq'); //アイテム
		$this->load->model('tbl_calendar_model', 'calendar'); //アイテム
		$this->load->model('tbl_ymd_model', 'ymd'); //アイテム
		//
		$data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
		$data['ymdcnt'] = $this->ymd->count_ymd_all();
        //カレンダー情報
        $data['faq'] = $this->faq->get_faq_list();

		$this->load->view('include/header',$data);
		$this->load->view('faq');
		$this->load->view('include/footer',$data);
	}
	public function supportform()
	{
		$userid=-1;
        $data = array();
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
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
		$data['title'] = 'お問い合わせ';
	 	$data['note'] =  'お問い合わせ';
		$this->load->view('include/header',$data);
		$this->load->view('supportform',$data);
		$this->load->view('include/footer',$data);
	}
}