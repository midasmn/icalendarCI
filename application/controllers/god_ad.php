<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class God_ad extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
        $this->load->helper('form');
        $this->output->cache(360);
        $this->config->load('icalendar');
        // $this->output->enable_profiler(TRUE);
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
        if($userid==1){}else{redirect("/",'refresh');}
        // ログインセッション
        $exm=$this->uri->segment(1);    //一覧ソートセグメント smart
        $data['exm']=$exm;
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');
        $limit = 100; //1ページ数
        $offset=$this->uri->segment(2); //ページ番号セグメント
        $data['total'] = $this->calendar->find_calist_all();    //全件取得
        $total_cnt = count($data['total'] );    
        $data['total_cnt'] = $total_cnt;              //ページネーション用全件     
        //カレンダー遷移用セッション
        $cal_page = array('exm'  => $exm,'total_cnt' => $total_cnt );
        $this->session->set_userdata($cal_page);
        // データ取得のリミットとオフセット
        $data['calist'] = $this->calendar->find_calist_arr($exm,$limit,$offset);
        //ページネーション設定
        $this->load->library('pagination');
        $config['base_url'] = 'http://icalendar.xyz/'.$exm;
        $config['total_rows'] = $total_cnt;
        $config['per_page'] = $limit; 
        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();
        //メニューお気に入りセレクト
        $this->load->view('include/header',$data);
        $this->load->view('adlist',$data);
        $this->load->view('include/footer',$data);
    }
}