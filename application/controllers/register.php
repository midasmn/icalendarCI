<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        // $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data = array(
            'title' => 'ID(無料)を登録する',
            'note' => 'ID(無料)を登録する'
            );
        $this->load->view('include/header',$data);
        $this->load->view('register',$data);
        // $this->load->view('login',$data);
        $this->load->view('include/footer',$data);
    }
}