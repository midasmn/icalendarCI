<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller{

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
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        // $this->session->set_flashdata('redirect_url', uri_string());
        //リダイレクト用URL
        // $exm=$this->uri->segment(1);    //一覧ソートセグメント
        $exm = $this->input->post("exm");
        if(!$exm){
            $exm=$this->uri->segment(2);    //一覧ソートセグメント
        }
        $data['exm']=$exm;
        //
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

        // スター
        if($userid==-1)
        {}else{
            $this->load->model('tbl_star_model', 'star'); //ログ
            $data['star'] = $this->star->get_calendar_starlist($userid) ;
        }
        // スター
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
        $this->load->model('tbl_calendar_model', 'calendar');
        //リスト判定
        switch ($exm) {
            case 'smart':
            	$data['title'] = "人気順カレンダーリスト";
                $data['exm_title'] = "人気順";
                break;
            case 'newer':
            	$data['title'] = "新着順カレンダーリスト";
                $data['exm_title'] = "新着順";
                break;
            case 'random':
            	$data['title'] = "ランダム順カレンダーリスト";
                $data['exm_title'] = "ランダム";
                break;
            default:
            	$data['title'] = "新着順カレンダーリスト";
                $data['exm_title'] = "新着順";
                break;
        }
        $limit = 100; //1ページ数
        // $offset=$this->uri->segment(2); //ページ番号セグメント
        $offset=$this->uri->segment(3); //ページ番号セグメント
        /////// ログ
        $this->load->model('tbl_logs_model', 'logr'); //ログ
        $logdata = array( 'userid' => $userid, 'exm' => 'search' , 'etc' => $exm);
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        $this->load->model('tbl_calendar_model', 'calendar');   //テーブル
        // $data['total'] = $this->calendar->find_calist_all();    //全件取得
        $data['total'] = $this->calendar->search_calist_all($arr_keyword);    //全件取得
        $total_cnt = count($data['total'] );  
        $data['total_cnt']=$total_cnt;          //ページネーション用全件     
        //カレンダー遷移用セッション
        $cal_page = array('exm'  => $exm,'total_cnt' => $total_cnt );
        $this->session->set_userdata($cal_page);
        // データ取得のリミットとオフセット
        // $data['calist'] = $this->calendar->find_calist_arr($exm,$limit,$offset);
        $data['calist'] = $this->calendar->search_calist_arr($arr_keyword,$sort,$limit,$offset);
        //ページネーション設定
        $this->load->library('pagination');
        // $config['base_url'] = 'http://icalendar.xyz/'.$exm;
        $config['base_url'] = 'http://icalendar.xyz/search/'.$exm;
        $config['total_rows'] = $total_cnt;
        $config['per_page'] = $limit; 
        $config['uri_segment'] = 3;     //searchページ番号セグメント
        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();
        // OGタグ設定
        $data['title'] = $keyword.'の'.$data['title'];

        // $data['og_url'] = $config['base_url']."/".$config['per_page'];
        // $data['og_description'] = $data['og_title']." - イメージカレンダー : iCalendar.xyz." ;
        // OGタグ設定
        // OGタグ設定
        $data['og_title'] = $data['title'];
        $data['og_url'] = "/".$this->uri->uri_string();
        $data['og_description'] = $data['og_title'].'。'.$data['description'];
        // OGタグ設定
        $data['keywords'] = $keyword.','.$data['keywords'];
        $data['description'] = $data['og_description'];
        $data['title'] = $data['og_title'] ." : iCalendar.xyz.";

        //メニューお気に入りセレクト
        if($userid<>-1){
            $data['menu'] = $this->calendar->menu_favorites_arr($userid);
        }
        //メニューお気に入りセレクト
        $this->load->view('include/header',$data);
        $this->load->view('list',$data);
        $this->load->view('include/footer',$data);
    }
}