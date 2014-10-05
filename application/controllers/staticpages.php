<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staticpages extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->config->load('icalendar');
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
        $data['descriptiondb'] = $this->static->get_description('about');
        //staticDB
        // OGタグ設定
        $data['og_title'] = 'iCalendarついて - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定
        //メニューお気に入りセレクト
        // if($userid<>-1){
        //     $this->load->model('tbl_calendar_model', 'calendarM');   
        //     $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        // }
        ///////////
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
        $data['descriptiondb'] = $this->static->get_description('terms');
        //staticDB
        // OGタグ設定
        $data['og_title'] = '利用規約 - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定
        //メニューお気に入りセレクト
        // if($userid<>-1){
        //     $this->load->model('tbl_calendar_model', 'calendarM');   
        //     $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        // }
        ///////////
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
        $data['descriptiondb'] = $this->static->get_description('privacy');
        //staticDB
        // OGタグ設定
        $data['og_title'] = 'プライバシーポリシー - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定
	    //メニューお気に入りセレクト
        // if($userid<>-1){
        //     $this->load->model('tbl_calendar_model', 'calendarM');   
        //     $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        // }
        ///////////
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
        // OGタグ設定
        $data['og_title'] = 'よくある質問(FAQ) - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定

		$this->load->model('tbl_faq_model', 'faq'); //アイテム
		$this->load->model('tbl_calendar_model', 'calendar'); //アイテム
		$this->load->model('tbl_ymd_model', 'ymd'); //アイテム
		//
		$data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
		$data['ymdcnt'] = $this->ymd->count_ymd_all();
        //カレンダー情報
        $data['faq'] = $this->faq->get_faq_list();
        //メニューお気に入りセレクト
        // if($userid<>-1){
        //     $this->load->model('tbl_calendar_model', 'calendarM');   
        //     $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        // }
        ///////////
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
        // OGタグ設定
        $data['og_title'] = 'お問い合わせ - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定
        //メニューお気に入りセレクト
        if($userid<>-1){
            $this->load->model('tbl_calendar_model', 'calendarM');   
            $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        }
        ///////////
		$this->load->view('include/header',$data);
		$this->load->view('supportform',$data);
		$this->load->view('include/footer',$data);
	}
    public function news()
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
        // OGタグ設定
        $data['og_title'] = '最新情報 - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定

        $this->load->model('tbl_news_model', 'news'); //アイテム
        //カレンダー情報
        $data['news'] = $this->news->get_list();
        //メニューお気に入りセレクト
        // if($userid<>-1){
        //     $this->load->model('tbl_calendar_model', 'calendarM');   
        //     $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        // }
        ///////////
        $this->load->view('include/header',$data);
        $this->load->view('news');
        $this->load->view('include/footer',$data);
    }
    public function report()
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
        // OGタグ設定
        $data['og_title'] = 'レポート - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // OGタグ設定
        //メニューお気に入りセレクト
        if($userid<>-1){
            $this->load->model('tbl_calendar_model', 'calendarM');   
            $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        }
        ///////////
        $this->load->model('tbl_report_model', 'report'); //アイテム
        //カレンダー情報
        $data['report'] = $this->report->get_list();

        $this->load->view('include/header',$data);
        $this->load->view('report');
        $this->load->view('include/footer',$data);
    }
}