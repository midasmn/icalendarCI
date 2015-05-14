<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->config->load('icalendar');
        // $this->load->helper('url');
        // $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        $this->load->helper('form');
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
    }
    public function index()
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
        //パンくずURL
        // $pan_list = $this->session->flashdata('pan_list');
        // $pan_cal = $this->session->flashdata('pan_cal');
        // $pan_itm = $this->session->flashdata('pan_itm');
        // $data['pan_list']  = $pan_list;
        // $data['pan_cal']  = $pan_cal;
        // $data['pan_itm']  = $pan_itm;
        $this->session->set_flashdata('pan_list', current_url());
        // $this->session->set_flashdata('pan_cal', current_url());
        // $this->session->set_flashdata('pan_itm', current_url());
        // ログインセッション
        //セグメント取得
        $exm=$this->uri->segment(1);  
        /////// ログ
        $this->load->model('tbl_logs_model', 'logr'); //ログ
        $logdata = array(  'userid' => $userid,'exm' => 'sitemap');
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        // ogタグ初期値
        $data['og_title'] = 'ジャンル一覧 - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $data['og_title'] ;
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // ogタグ
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');   //カレンダー
        //カレンダー情報
        $data['cal_info'] = $this->calendar->find_calist_all();
        $total_cnt = count($data['cal_info'] );    
        $data['total_cnt'] = $total_cnt;  
        //////////////////////////
        //メニューお気に入りセレクト
        if($userid<>-1){
            $this->load->model('tbl_calendar_model', 'calendarM');   
            $data['menu'] = $this->calendarM->menu_favorites_arr($userid);
        }
        ///////////
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        $data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
        $data['ymdcnt'] = $this->ymd->count_ymd_all();

        $data['exm_title'] = "ジャンル一覧";
        $this->load->view('include/header',$data);
        $this->load->view('sitemap',$data);
        $this->load->view('include/footer',$data);
    }
}