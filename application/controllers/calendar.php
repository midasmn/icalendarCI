<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendar extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->output->enable_profiler(TRUE);
        $this->output->cache(360);
        // $this->load->library('session');
    }

    public function index()
    {
        $data = array();
        $exm=$this->uri->segment(1);
        if($exm=="calendar"){
            $calendar_id=$this->uri->segment(2);
            $yyyy=$this->uri->segment(3);

// echo "<br>segment3:".$yyyy;
            if(!$yyyy){$yyyy=date('Y');}
            $mm=$this->uri->segment(4);
// echo "<br>segment4:".$mm;
            if(!$mm){$mm = date('n');}
        }
        $data['cal_id'] = $calendar_id;
        $data['yyyy'] = $yyyy;
        $data['mm'] = $mm;
        $data['mm_st'] = date('F',strtotime($yyyy."-".$mm."-1"));
        //
        $data['n_yyyy'] = $yyyy;
        $data['n_mm'] = $mm + 1;
        $data['p_yyyy'] = $yyyy;
        $data['p_mm'] = $mm - 1;
        //12月１月処理
        if($mm==12){$data['n_yyyy'] = $yyyy + 1;$data['n_mm'] = 1;}
        if($mm==1){$data['p_yyyy'] = $yyyy - 1;$data['p_mm'] = 12;}
        //
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');   //カレンダー
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        //カレンダー情報
        $data['cal_info'] = $this->calendar->get_calist_info($calendar_id);
        $data['ymd_list'] = $this->ymd->find_month_list($calendar_id,$yyyy,$mm);

        $data['title'] = $data['ymd_list'] ['cal_title'];

        $this->load->view('include/header',$data);
        $this->load->view('calendar',$data);
        $this->load->view('include/footer',$data);
    }
}