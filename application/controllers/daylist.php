<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daylist extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        // $this->output->enable_profiler(TRUE);
        $this->output->cache(360);
        $this->load->library('session');
        $this->config->load('icalendar');
        $this->load->library('user_agent');
        //リダイレクト用URL
        $this->session->set_flashdata('redirect_url', current_url());
        $this->session->set_userdata('histry_url', current_url());
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
        $pan_list = $this->session->flashdata('pan_list');
        if($pan_list=="http://icalendar.xyz/smart"){$pan_list_title = '人気順リスト';}
        if($pan_list=="http://icalendar.xyz/newer"){$pan_list_title = '新着順リスト';}
        if($pan_list=="http://icalendar.xyz/random"){$pan_list_title = 'ランダム順リスト';}
        if($pan_list=="http://icalendar.xyz/sitemap"){$pan_list_title = 'ジャンル一覧';}
        $data['pan_list']  = $pan_list;
        $data['pan_list_title']  = $pan_list_title;
        $this->session->set_flashdata('pan_list', $pan_list);
        // $this->session->set_flashdata('pan_cal', current_url());
        // $this->session->set_flashdata('pan_itm', current_url());
        // ログインセッション
        //セグメント取得
        $exm=$this->uri->segment(1);    //daylist
// echo "<br>1:".$exm;
        $calendar_id=$this->uri->segment(2);    //カレンダID
// echo "<br>2:".$calendar_id;
        $yyyy=$this->uri->segment(3);   //YYYY
// echo "<br>3:".$yyyy;
        $mm=$this->uri->segment(4);     //MM
        $dd=$this->uri->segment(5);     //MM
        /////// ログ
        $this->load->model('tbl_logs_model', 'logr'); //ログ
        $logdata = array(  'userid' => $userid,'exm' => 'daylist', 'calid' => $calendar_id , 'yyyy' => $yyyy , 'mm' => $mm , 'dd' => $dd);
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        // ogタグ初期値
        $data['og_title'] = $this->config->item('og_title', 'icalendar');
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_image2'] = $this->config->item('og_image2', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $this->config->item('title', 'icalendar');
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');
        // ogタグ
        //日付チェック
        if($yyyy&&$mm){
            $timeStamp = strtotime($yyyy .'-'.$mm. "-".$dd);
            if($timeStamp === false)
            {
                $yyyy = date("Y");
                $mm = date("n");
                $dd = date("n");
            }
        }else{
            $yyyy = date("Y");
            $mm = date("n");
            $dd = date("d");
        }
        //
        $data['cal_id'] = $calendar_id;
        $data['yyyy'] = $yyyy;
        $data['mm'] = $mm;
        $data['dd'] = $dd;
        $data['mm_st'] = date('F',strtotime($yyyy."-".$mm."-".$dd));   //英語曜日
        //
        $data['prev'] = str_replace("-", "/", date("Y-m-d",mktime(0,0,0,$mm,$dd-1,$yyyy))); //前月リンク用
        $data['next'] = str_replace("-", "/", date("Y-m-d",mktime(0,0,0,$mm,$dd+1,$yyyy))); //翌月リンク用
        //
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');   //カレンダー
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        //カレンダー情報
        $data['cal_info'] = $this->calendar->get_calist_info($calendar_id);
        foreach ($data['cal_info']  as $rowR) 
        {
            $data['title'] = $yyyy."年".$mm."月".$dd."日".$rowR->cal_title;
        }
        //DBカレンダアイテム
        $data['dayitem'] = $this->ymd->find_day_list($calendar_id,$yyyy,$mm,$dd);
   
        //////////////////////////
        //メニューお気に入りセレクト
        if($userid<>-1){
            $data['menu'] = $this->calendar->menu_favorites_arr($userid);
        }
        // $data['title'] = $yyyy."年".$mm."月".$dd."日".$data['title'];              
        // OGタグ設定
        // OGタグ設定
        // $lastday =  date('Ymd', strtotime('-1 day'));
        $lastday =  date('Ymd');
        $yyyy = substr($lastday, 0,4);
        $mm = substr($lastday, 4,2);
        $dd = substr($lastday, 6,2);
        $ogimg = $this->ymd->get_ogimage($calendar_id,$yyyy,$mm,$dd);
        foreach ($ogimg as $value) { //3回繰り返し
            $img_path = $value->img_path; //画像URL
            $img_path = str_replace('128x128', '200x200', $img_path);
            $data['og_image'] = $img_path;
        }

        $data['og_title'] = $data['title'];
        $data['og_url'] = $config['base_url']."/daylist/".$calendar_id."/".$yyyy."/".$mm."/".$dd;
        $data['og_description'] = $data['og_title'].'。'.$data['description'];
        // OGタグ設定
        $data['keywords'] = $data['title'].','.$data['keywords'];
        $data['description'] = $data['og_description'];
        $data['title'] = $data['og_title'] ." : インテリカレンダー";
        // OGタグ設定
        // 登録件数
        $this->load->model('tbl_count_model', 'count');  
        $data['day_cnt'] = $this->count->get_count();
        //メニューお気に入りセレクト
        $this->load->view('include/header',$data);
        $this->load->view('daylist',$data);
        $this->load->view('include/footer',$data);
    }
}