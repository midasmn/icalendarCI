<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->helper('array');
        // $this->output->enable_profiler(TRUE);
        // $this->output->cache(360);
        // $this->load->library('session');
    }

    public function star_list()
    {
        $calendar_id = (int)$_POST['calendar_id'];
        $userid = (int)$_POST['userid'];
        $exm = $_POST['exm'];

        if(!$userid){$userid=1;}
        if(!$calendar_id){$calendar_id=1;}

        $this->load->model('tbl_star_model', 'star'); 
        // $rtn_arr = $this->star->insert_update_chck($exm,$calendar_id,$userid);
        // if(count($rtn_arr)>=1)
        // {
        //     //アップデート
        //     foreach ($rtn_arr as $key1 => $value1)
        //     {
        //         foreach ($value1 as $key2 => $value2)
        //         {
        //             if($key2=='starflg'){$starflg=$value2;}
        //             if($key2=='id'){$id=$value2;}
        //         }
        //     }
        //     // $this->star->update($exm,$calendar_id,$userid,$id,$starflg);
        // }else{
            // $this->star->insert($exm,$calendar_id,$userid);      
        // }    


        // echo $calendar_id.'-'.$userid;
        // return/
    }

    public function test()
    {

         // var param = { "calid": "calendar_id", "uid": userid };

        // $json = file_get_contents('php://input');
        // $data = json_decode($json, true);
 
        // $calid      = isset($data['calid'])       ? $data['calid']     : "";
        // $uid      = isset($data['uid'])       ? $data['uid']     : "";
        // $uid    = isset($data['uid'])     ? $data['uid']   : null;
        // $callback  = isset($_GET['callback'])   ? $_GET["callback"] : "";
        // $callback  = htmlspecialchars(strip_tags($callback));

    }

}
