<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calist extends CI_Controller{

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
        // ログインセッション
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        // $this->session->set_flashdata('redirect_url', uri_string());
        //リダイレクト用URL
        $exm=$this->uri->segment(1);    //一覧ソートセグメント
        $data['exm']=$exm;
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
        $offset=$this->uri->segment(2); //ページ番号セグメント
        /////// ログ
        $this->load->model('tbl_log_model', 'logr'); //ログ
        $logdata = array( 'userid' => $userid, 'item1' => $exm , 'item2' => $offset);
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        $this->load->model('tbl_calendar_model', 'calendar');   //テーブル
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
        // OGタグ設定
        $data['og_title'] = $data['title']." - iCalendar.xyz.";
        $data['og_url'] = $config['base_url']."/".$config['per_page'];
        // $data['og_url'] = "/".$this->uri->uri_string();
        $data['og_description'] = $data['title'].'。'.$data['description'];
        // OGタグ設定
        $data['keywords'] = $data['title'].','.$data['keywords'];
        $data['description'] = $data['og_description'];
        $data['title'] = $data['og_title'];

        // OGタグ設定
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