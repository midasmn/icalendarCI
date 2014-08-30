<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jquery extends CI_Controller{

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
        //UserID
        $userid = "99";
        $exm = "calendar";
        $itemid = 333;


        $this->load->model('tbl_star_model', 'star'); //ログ
        $rtn_id = $this->star->insert_update_chck($exm,$itemid,$userid);
        if($rtn_id=="UP")
        {
            $rtn_id = $this->star->update($exm,$itemid,$userid,$rtn_id);
        }else{
            $rtn_id = $this->star->insert($exm,$itemid,$userid);
        }      

        // $rtn_id = $exm;
        echo $exm;
        echo "<hr>";
        echo $rtn_id;
        echo "<hr>";

        //////////////////////////
        // $this->load->view('include/header',$data);
        // $this->load->view('test',$rtn_id);
        // $this->load->view('include/footer',$data);
    }

}
