<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->config->load('icalendar');
        // $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data = array();
        $data['og_title'] =  'ID(無料)を登録する - iCalendar.xyz.';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $this->config->item('title', 'icalendar');
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');

        $this->load->model('tbl_calendar_model', 'calendar'); //アイテム
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        $data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
        $data['ymdcnt'] = $this->ymd->count_ymd_all();

        $this->load->view('include/header',$data);
        $this->load->view('register',$data);
        // $this->load->view('login',$data);
        $this->load->view('include/footer',$data);
    }
}