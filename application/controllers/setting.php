<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data = array(
            'title' => '登録情報設定',
            'note' => '登録情報設定'
            );
        $this->load->view('include/header',$data);
        $this->load->view('setting',$data);
        $this->load->view('include/footer',$data);
    }
}