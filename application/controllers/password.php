<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Password extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $data = array(
            'title' => 'パスワードを再設定する',
            'note' => 'パスワードを再設定する'
            );
        $this->load->view('include/header',$data);
        $this->load->view('password',$data);
        $this->load->view('include/footer',$data);
    }
}