<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calist extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array();
        $exm=$this->uri->segment(1);    //一覧ソートセグメント
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
        $limit = 30; //1ページ数
        $offset=$this->uri->segment(2); //ページ番号セグメント
        $this->load->model('tbl_calendar_model', 'calendar');   //テーブル
        $data['total'] = $this->calendar->find_calist_all();    //全件取得
        $total_cnt = count($data['total'] );                    //ページネーション用全件       
        // データ取得のリミットとオフセット
        $data['calist'] = $this->calendar->find_calist($exm,$limit,$offset);
        //ページネーション設定
        $this->load->library('pagination');
        $config['base_url'] = 'http://icalendar.xyz/'.$exm;
        $config['total_rows'] = $total_cnt;
        $config['per_page'] = $limit; 
        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();

        $this->load->view('include/header',$data);
        $this->load->view('list',$data);
        $this->load->view('include/footer',$data);
    }
}