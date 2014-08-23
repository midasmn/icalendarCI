<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $data = array(
            'title' => 'iCalendarID(無料)を登録する',
            'note' => 'iCalendarID(無料)を登録する'
            );
        $this->load->view('include/header',$data);
        $this->load->view('register',$data);
        $this->load->view('include/footer',$data);
    }
}