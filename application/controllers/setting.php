<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->config->load('icalendar');
        // $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        $this->load->library('session');
    }

    public function index()
    {
        $userid=-1;
        $data = array();
        $data['og_title'] = '登録情報設定 - インテリカレンダー';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = '登録情報設定 - インテリカレンダー';
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
        // //メニューお気に入りセレクト
        if($userid<>-1){
            $this->load->model('tbl_calendar_model', 'calendar');   
            $data['menu'] = $this->calendar->menu_favorites_arr($userid);
        }
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        $data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
        $data['ymdcnt'] = $this->ymd->count_ymd_all();
        // //メニューお気に入りセレクト
        $this->load->view('include/header',$data);
        $this->load->view('setting',$data);
        $this->load->view('include/footer',$data);
    }
}