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

        $this->load->library('pagination');
        // $config['base_url'] = 'http://icalendar.xyz/calist/index/'.$exm.'/page/';
        $config['base_url'] = 'http://icalendar.xyz/'.$exm.'/';
        // $config['total_rows'] = 200;
        $config['total_rows'] = count($data['calist'] );
        $config['per_page'] = 20; 
        $config['num_links'] = 5; 

        //最初のリンク
        $config['first_link'] = '&laquo;';
        $config['first_tag_open'] = '<li class="disabled"><span>';
        $config['first_tag_close'] = '</span></li>';
        //最後のリンク
        $config['last_link'] = '&raquo;';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '';
        $config['next_link'] = '';
        //現在ページタグ
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        //
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();

        $this->load->view('include/header',$data);
        $this->load->view('list',$data);
        $this->load->view('include/footer',$data);
    }
}