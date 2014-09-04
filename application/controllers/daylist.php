<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daylist extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        // $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        // $this->load->library('session');
    }

    public function index()
    {
        $userid = -1;
        $data = array();
        // ログインセッション
        if($this->session->userdata("is_logged_in")){   //ログインしている場合の処理
            // $data['userid'] = $userid;
            $data['userid'] = $this->session->userdata("userid");
            $data['status'] = $this->session->userdata("status");
            $data['profile_img'] = $this->session->userdata("profile_img");
            // $date[''] = $
        }else{
            $userid = -1;
        }
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
        $this->load->model('tbl_log_model', 'logr'); //ログ
        $logdata = array(  'userid' => $userid,'item1' => $exm , 'item2' => $calendar_id , 'item3' => $yyyy , 'item4' => $mm , 'item5' => $dd);
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        // ogタグ初期値
        $data['og_title'] = "画像で振り返る、あの日の記録 - イメージカレンダー : iCalendar.xyz.";
        $data['og_image'] = "http://icalendar.xyz/iTunesArtwork-512.jpg" ;
        $data['og_url'] = "http://icalendar.xyz" ;
        $data['og_description'] = "あの日の出来事を日付ごとの画像カレンダーで振り返れます。" ;
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
        foreach ($cal_info as $rowR) {$data['title'] = $rowR->cal_title;}
        //DBカレンダアイテム
        $data['dayitem'] = $this->ymd->find_day_list($calendar_id,$yyyy,$mm,$dd);
   
        //////////////////////////
        $this->load->view('include/header',$data);
        $this->load->view('daylist',$data);
        $this->load->view('include/footer',$data);
    }
}