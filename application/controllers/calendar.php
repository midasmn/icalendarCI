<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        // $this->load->library('session');
    }

    public function index()
    {
        $data = array();
        //セグメント取得
        $exm=$this->uri->segment(1);    //calendar
        $calendar_id=$this->uri->segment(2);    //カレンダID
        $yyyy=$this->uri->segment(3);
        $mm=$this->uri->segment(4);
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
        $this->load->model('tbl_calendar_model', 'calendar');   //カレンダー
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        //カレンダー情報
        $data['cal_info'] = $this->calendar->get_calist_info($calendar_id);
        foreach ($cal_info as $rowR) {$data['title'] = $rowR->cal_title;}
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
        $week .= str_repeat('<td class="col-xs-1 col-sm-1 col-md-1"></td>',$youbi);    //空埋め
        //
        for($day = 1; $day <= $lastDay; $day++, $youbi++)
        {
            //1日から最終日まで
            $week .= '<td class="col-xs-1 col-sm-1 col-md-1">';
            $week .= '<a  href="/item/'.$calendar_id.'/'.$yyyy.'/'.$mm.'/'.$day.'"';
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
                    $week .= str_repeat('<td class="col-xs-1 col-sm-1 col-md-1"></td>', 6 - ($youbi % 7));
                }
                $weeks[]= '<tr>'.$week.'</tr>';
                $week = '';
            }
        }
        $data['cal_tbl'] = $weeks;
        //////////////////////////
        $this->load->view('include/header',$data);
        $this->load->view('calendar',$data);
        $this->load->view('include/footer',$data);
    }
}