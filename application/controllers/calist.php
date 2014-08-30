<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calist extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        $this->load->library('session');
    }

    public function index()
    {
        //ユーザID
        $userid = "99";
        $data = array();
        $data['userid'] = $userid;
        $exm=$this->uri->segment(1);    //一覧ソートセグメント
        // ogタグ初期値
        $data['og_title'] = "画像で振り返る、あの日の記録 - イメージカレンダー : iCalendar.xyz.";
        $data['og_image'] = "http://icalendar.xyz/iTunesArtwork-512.jpg" ;
        $data['og_url'] = "http://icalendar.xyz" ;
        $data['og_description'] = "あの日の出来事を日付ごとの画像カレンダーで振り返れます。" ;
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
            	$data['title'] = "新着順一覧";
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
        $total_cnt = count($data['total'] );                    //ページネーション用全件     
        //カレンダー遷移用セッション
        $cal_page = array('exm'  => $exm,'total_cnt' => $total_cnt );
        $this->session->set_userdata($cal_page);
        // データ取得のリミットとオフセット
        $data['calist'] = $this->calendar->find_calist($exm,$limit,$offset);
        //ページネーション設定
        $this->load->library('pagination');
        $config['base_url'] = 'http://icalendar.xyz/'.$exm;
        $config['total_rows'] = $total_cnt;
        $config['per_page'] = $limit; 
        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();
        // OGタグ設定
        $data['og_title'] = $data['title'];
        $data['og_url'] = $config['base_url']."/".$config['per_page'];
        $data['og_description'] = $data['og_title']." - イメージカレンダー : iCalendar.xyz." ;
        // OGタグ設定
        $this->load->view('include/header',$data);
        $this->load->view('list',$data);
        $this->load->view('include/footer',$data);
    }
}