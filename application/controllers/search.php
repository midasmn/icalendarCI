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

        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        $exm = $this->input->post("exm");
        if(!$exm){
            $exm=$this->uri->segment(2);    //一覧ソートセグメント
        }
        $data['exm']=$exm;
        $data['exm']='smart';
        $this->session->set_flashdata('pan_list', 'http://icalendar.xyz/smart');
        //
        $keyword = $this->input->post("keyword");
        if(!$keyword){
            $keyword = $this->session->flashdata('keyword');
        }
        $this->session->set_flashdata('keyword', $keyword); //フラッシュデータ
        $data['flash_keyword'] = $keyword;
        $keyword = preg_replace('/(\s|　)/',',',$keyword);   //全角半角スペースをカンマに
        $keyword = str_replace('楽天市場', '楽天', $keyword);
        $keyword = str_replace('楽天', '楽天市場', $keyword);
        $arr_keyword = explode(',',trim($keyword));   //カンマ区切りを配列に
        // ogタグ初期値
        $data['og_title'] = $this->config->item('og_title', 'icalendar');
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        $data['title'] = $this->config->item('title', 'icalendar');
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');
        //リスト判定
        switch ($exm) 
        {
            case 'smart':
                $data['title'] = "人気順カレンダーリスト";
                $data['exm_title'] = "人気順一覧";
                $data['exm']='smart';
                break;
            case 'sitemap':
                $data['title'] = "インテリカレンダージャンル一覧";
                $data['exm_title'] = "ジャンル一覧";
                $data['exm']='sitemap';
                break;
            // case 'random':
            //     $data['title'] = "ランダム順カレンダーリスト";
            //     $data['exm_title'] = "ランダム";
            //     break;
            default:
                $data['title'] = "人気順カレンダーリスト";
                $data['exm_title'] = "人気順一覧";
                $data['exm']='smart';
                break;
        }        
        $limit = 100; //1ページ数
        // $offset=$this->uri->segment(2); //ページ番号セグメント
        $offset=$this->uri->segment(3); //ページ番号セグメント
        /////// ログ
        $this->load->model('tbl_log_model', 'logr'); //ログ
        $logdata = array( 'userid' => $userid, 'item1' => $exm , 'item2' => $offset);
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        $this->load->model('tbl_calendar_model', 'calendar');   //テーブル
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
        $config['base_url'] = 'http://icalendar.xyz/search/'.$exm;
        $config['total_rows'] = $total_cnt;
        $config['per_page'] = $limit; 
        $config['uri_segment'] = 3;     //searchページ番号セグメント
        $this->pagination->initialize($config); 
        $data['page_link'] = $this->pagination->create_links();
        // OGタグ設定
        $data['og_title'] = $data['title'];
        $data['og_url'] = $config['base_url']."/".$config['per_page'];
        $data['og_description'] = $data['og_title']." - イメージカレンダー : iCalendar.xyz." ;
        // OGタグ設定
        //メニューお気に入りセレクト
        $this->load->view('include/header',$data);
        $this->load->view('list',$data);
        $this->load->view('include/footer',$data);

    }
}