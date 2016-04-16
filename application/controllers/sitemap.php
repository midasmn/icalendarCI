<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->config->load('icalendar');
        // $this->load->helper('url');
        // $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        $this->load->library('user_agent');
        $this->load->helper('form');
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        //リダイレクト用URL
    }
    public function index()
    {
        $userid=-1;
        $data = array();
        // モバイルフラグ
        if($this->agent->is_mobile())
        {
            $data['mobile'] = "SP";//mob
        }else{
            $data['mobile'] = "PC";//PC
        }
        //パンくずURL
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
        $data['og_title'] = 'ジャンル一覧 - インテリカレンダー';
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
        // 登録件数
        $this->load->model('tbl_count_model', 'count');  
        $data['day_cnt'] = $this->count->get_count();
        $data['exm_title'] = "ジャンル一覧";
        $this->load->view('include/header',$data);
        $this->load->view('sitemap',$data);
        $this->load->view('include/footer',$data);
    }
}