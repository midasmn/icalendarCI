<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jquery extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->helper('array');
        $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        // $this->load->library('session');
    }

    public function index()
    {
        //UserID
        $userid = 99;
        $exm = "calendar";
        $itemid = 353;


        $this->load->model('tbl_star_model', 'star'); //ログ
        $rtn_arr = $this->star->insert_update_chck($exm,$itemid,$userid);
        if(count($rtn_arr)>=1)
        {
            //アップデート
            print_r($rtn_arr);
            foreach ($rtn_arr as $key1 => $value1)
            {
                foreach ($value1 as $key2 => $value2)
                {
                //  echo "<br>key".$key2 ;
                // echo "<br>value".$value2 ;
                if($key2=='starflg'){$starflg=$value2;}
                if($key2=='id'){$id=$value2;}
                }
            }
// echo "<br>strt".$starflg ;
// echo "<br>id".$id ;
            $rtn_id = $this->star->update($exm,$itemid,$userid,$id,$starflg);
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
