<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Keyword extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
        $this->load->helper('form');
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
        // ログインセッション
        //パンくずURL
        // $this->session->set_flashdata('pan_list', current_url());
        $this->session->set_flashdata('pan_list', "http://icalendar.xyz/keyword");
        
        // ログインセッション
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        $this->session->set_userdata('histry_url', current_url());


        //リダイレクト用URL
        $keyword = $this->input->post("keyword");
        if(!$keyword){
            $keyword = $this->session->flashdata('keyword');
        }
        $this->session->set_flashdata('keyword', $keyword); //フラッシュデータ
        $data['flash_keyword'] = $keyword;
        $keyword = preg_replace('/(\s|　)/',',',$keyword);   //全角半角スペースをカンマに
        // $keyword = str_replace('楽天市場', '楽天', $keyword);
        // $keyword = str_replace('楽天', '楽天市場', $keyword);
        $arr_keyword = explode(',',trim($keyword));   //カンマ区切りを配列に
        // ogタグ初期値
        $data['og_title'] = $this->config->item('og_title', 'icalendar');
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $this->config->item('title', 'icalendar');
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // ogタグ
        // カレンダーテーブル
        $data['title'] = "キーワード検索";
        $data['exm_title'] = "[".$keyword."]検索結果";

        //リダイレクト用URL
        $exm=$this->uri->segment(1);    //一覧ソートセグメント
        $data['exm']=$exm;

        $limit = 100; //1ページ数
        $offset=$this->uri->segment(2); //ページ番号セグメント
        /////// ログ
        $this->load->model('tbl_logs_model', 'logr'); //ログ
        $logdata = array( 'userid' => $userid, 'exm' => $exm , 'etc' => $keyword);
        $rtn = $this->logr->insert($logdata);
        /////// ログ

        // データ取得のリミットとオフセット
        // データ取得のリミットとオフセット
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        $data['total']  =$this->ymd->search_keywordR_all($keyword);
        foreach ($data['total']  as $r) { $data['total_cnt'] =$r->total_cnt;}//ページネーション用全件
        // 
        $data['keyitem'] = $this->ymd->search_keywordR($keyword,$limit,$offset);
        // 
        //カレンダー遷移用セッション
        $cal_page = array('exm'  => $exm,'total_cnt' => $total_cnt );
        $this->session->set_userdata($cal_page);
        //ページネーション設定
        $this->load->library('pagination');
        $config['base_url'] = 'http://icalendar.xyz/'.$exm;
        $config['total_rows'] = $data['total_cnt'] ;
        $config['per_page'] = $limit; 
        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();

        // OGタグ設定
        $data['title'] = $keyword.'の'.$data['title'];
        // OGタグ設定
        $data['og_title'] = $data['title'];
        $data['og_url'] = "/".$this->uri->uri_string();
        $data['og_description'] = $data['og_title'].'。'.$data['description'];
        // OGタグ設定
        $data['keywords'] = $keyword.','.$data['keywords'];
        $data['description'] = $data['og_description'];
        $data['title'] = $data['og_title'] ." : iCalendar.xyz.";

        // 登録件数
        $this->load->model('tbl_count_model', 'count');  
        $data['day_cnt'] = $this->count->get_count();

        $this->load->view('include/header',$data);
        $this->load->view('result',$data);
        $this->load->view('include/footer',$data);
    }
}