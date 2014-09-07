<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $userid=-1;
        $data = array();
        // ログインセッション
        if($this->session->userdata("is_logged_in")){   //ログインしている場合の処理
            $email=$this->session->userdata("email");
            $userid=$this->session->userdata("userid");
            $status=$this->session->userdata("status");
            $profile_img=$this->session->userdata("profile_img");
            $remember=$this->session->userdata("remember");
            //
            $data['email'] = $email;
            $data['userid'] = $userid;
            $data['status'] = $status;
            $data['profile_img'] = $profile_img;
            $data['remember'] = $remember;
        }
        // ログインセッション
        $data['email'] = 'カレンダー追加';


        $this->load->view('include/header',$data);
        $this->load->view('add',$data);
        $this->load->view('include/footer',$data);
    }
}