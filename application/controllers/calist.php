<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calist extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        # 3番目のURIセグメントより、アイテムIDを取得します。セグメントデータがない
        # 場合は、1を設定します。
        // $exm = $this->uri->segment(1, "newer");


        // $exm = $this->uri->rsegment(1);
    }

    public function index()
    {
        $data = array();

        $exm = $this->uri->uri_string();
        // $data['out'] = $exm;
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');
        //リスト判定
        switch ($exm) {
            case 'smart':
            	$data['title'] = "カレンダー一覧(人気順)";
                $data['exm_title'] = "人気順";
                break;
            case 'newer':
            	$data['title'] = "カレンダー一覧(新着順)";
                $data['exm_title'] = "新着順";
                break;
            case 'random':
            	$data['title'] = "カレンダー一覧(ランダム)";
                $data['exm_title'] = "ランダム";
                break;
            
            default:
            	$data['title'] = "カレンダー一覧(新着順)";
                $data['exm_title'] = "新着順";
                break;
        }

        $this->load->model('tbl_calendar_model', 'calendar');
        $data['calist'] = $this->calendar->find_calist($exm);
        // $data['out'] = $this->calendar->find_calist($exm);

        $this->load->view('include/header',$data);
        $this->load->view('list',$data);
        $this->load->view('include/footer',$data);
    }
}