<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'title' => 'カレンダー追加',
            'note' => 'カレンダー追加'
            );
        $this->load->view('include/header',$data);
        $this->load->view('add',$data);
        $this->load->view('include/footer',$data);
    }
}