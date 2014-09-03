<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar extends CI_Controller{

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
        $exm=$this->uri->segment(1);    //calendar
// echo "<br>1:".$exm;
        $calendar_id=$this->uri->segment(2);    //カレンダID
// echo "<br>2:".$calendar_id;
        $yyyy=$this->uri->segment(3);
// echo "<br>3:".$yyyy;
        $mm=$this->uri->segment(4);
        /////// ログ
        $this->load->model('tbl_log_model', 'logr'); //ログ
        $logdata = array(  'userid' => $userid,'item1' => $exm , 'item2' => $calendar_id , 'item3' => $yyyy, 'item4' => $mm);
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        // スター
        $this->load->model('tbl_star_model', 'star'); //ログ
        $data['starflg'] = $this->star->get_calendar_starflg_read("calendar",$calendar_id,$userid);

        // スター
        // ogタグ初期値
        $data['og_title'] = "画像で振り返る、あの日の記録 - イメージカレンダー : iCalendar.xyz.";
        $data['og_image'] = "http://icalendar.xyz/iTunesArtwork-512.jpg" ;
        $data['og_url'] = "http://icalendar.xyz" ;
        $data['og_description'] = "あの日の出来事を日付ごとの画像カレンダーで振り返れます。" ;
        // ogタグ
        //カレンダーページ遷移用セッション
        $exm = $this->session->userdata('exm');
        $data['exm'] = $exm;
        $total_cnt = $this->session->userdata('total_cnt');
        $this->load->model('tbl_calendar_model', 'calendar');   //テーブル
        $data['calist'] = $this->calendar->find_calist($exm);
        $ch_arr = array();
        $n = 0;
        foreach ($data['calist'] as $rowS) 
        {
            $ch_arr[$n] = $rowS->cal_id;
            $n++;
        }
        $rtn_id = array_search($calendar_id,$ch_arr);
        $data['pr_cal'] = $ch_arr[$rtn_id-1]; //前月リンク用
        $data['nex_cal'] = $ch_arr[$rtn_id+1]; //翌月リンク用
        if($rtn_id==0){$data['pr_cal'] = "";}elseif($rtn_id==$total_cnt){$data['nex_cal'] = "";}
        //日付チェック
        if($yyyy&&$mm){
            $timeStamp = strtotime($yyyy .'-'.$mm. "-01");
            if($timeStamp === false)
            {
                $yyyy = date("Y");
                $mm = date("n");
            }
        }else{
            $yyyy = date("Y");
            $mm = date("n");
        }
        //
        $data['cal_id'] = $calendar_id;
        $data['yyyy'] = $yyyy;
        $data['mm'] = $mm;
        $data['mm_st'] = date('F',strtotime($yyyy."-".$mm."-1"));   //英語曜日
        //
        $data['prev'] = str_replace("-", "/", date("Y-m",mktime(0,0,0,$mm-1,1,$yyyy))); //前月リンク用
        $data['next'] = str_replace("-", "/", date("Y-m",mktime(0,0,0,$mm+1,1,$yyyy))); //翌月リンク用
        //
        // カレンダーテーブル
        // $this->load->model('tbl_calendar_model', 'calendar');   //カレンダー
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        //カレンダー情報
        $data['cal_info'] = $this->calendar->get_calist_info($calendar_id);
        foreach ($data['cal_info'] as $rowRR) {$data['title'] = $rowRR->cal_title;}
        //DBカレンダアイテム
        $calitem = $this->ymd->find_month_list($calendar_id,$yyyy,$mm);
        foreach ($calitem as $value) { //3回繰り返し
            $itmarr[$value->dd]['img_path'] = $value->img_path; //画像URL
            $itmarr[$value->dd]['img_alt'] = $value->img_alt;   //画像ALT 
        }
        //////////////////////////
        //カレンダー配列作成
        //////////////////////////
        $lastDay = date("t",mktime(0, 0, 0, $mm, 1, $yyyy));    //最終日
        $youbi = date("w",mktime(0, 0, 0, $mm, 1, $yyyy));   //1日の曜日
        $weeks = array();
        $week = '';
        //
        //公告枠
        if($youbi>=3){
            //広告枠
            
            $week .= '<td class="col-xs-1 col-sm-1 col-md-1"><img src="//icalendar.xyz/application/img/ad.jpg"  class="img-responsive" alt="広告枠" style="background-color:#428bca;"></td>';
            $week .= str_repeat('<td class="col-xs-1 col-sm-1 col-md-1"></td>',$youbi-1);    //空埋め
        }else{
             $week .= str_repeat('<td class="col-xs-1 col-sm-1 col-md-1"></td>',$youbi);    //空埋め
        }
        //
        for($day = 1; $day <= $lastDay; $day++, $youbi++)
        {
            //1日から最終日まで
            $week .= '<td class="col-xs-1 col-sm-1 col-md-1" >';
            $week .= '<a  href="/daylist/'.$calendar_id.'/'.$yyyy.'/'.$mm.'/'.$day.'"';
            $week .= ' class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" ';
            $week .= ' data-title="'.$itmarr[$day]['img_alt'].'" data-content="'.$itmarr[$day]['img_alt'].'">';
            $week .= '<span>'.$day.'</span>';
            if(!$itmarr[$day]['img_path']){
                $week .= '<img src="//icalendar.xyz/application/img/blank.jpg" ';
            }else{
                 $week .= '<img src="'.$itmarr[$day]['img_path'].'"  ';
            }
            $week .= ' class="img-responsive" alt="'.$yyyy.'年'.$mm.'月'.$day.'日" style="background-color:#428bca;">';
            $week .= '</a>';
            $week .= '</td>';
        //     //土曜日週ごとに分割
            if($youbi % 7 == 6 OR $day == $lastDay)
            {       
                if($day == $lastDay)
                {
                    //広告枠
                    if((6 - ($youbi % 7))>=3){
                        //公告枠
                        $week .= str_repeat('<td class="col-xs-1 col-sm-1 col-md-1"></td>', 6 - ($youbi % 7)-1);

                        $week .= '<td class="col-xs-1 col-sm-1 col-md-1"><img src="//icalendar.xyz/application/img/ad.jpg"  class="img-responsive" alt="広告枠" style="background-color:#428bca;"></td>';
                    }else{
                        $week .= str_repeat('<td class="col-xs-1 col-sm-1 col-md-1"></td>', 6 - ($youbi % 7));
                    }
                    
                }
                $weeks[]= '<tr>'.$week.'</tr>';
                $week = '';
            }
        }
        $data['cal_tbl'] = $weeks;
        //////////////////////////
        // OGタグ設定
        $data['og_title'] = $data['title']."カレンダー".$data['yyyy'].'年'.$data['mm'].'月';
        $data['og_url'] = "/".$this->uri->uri_string();
        $data['og_description'] = $data['og_title']." : iCalendar.xyz." ;
        // OGタグ設定
        $this->load->view('include/header',$data);
        $this->load->view('calendar',$data);
        $this->load->view('include/footer',$data);
    }
}