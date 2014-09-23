<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$exm = "calendar";
		if(!$userid){$userid=1;}
        if(!$calendar_id){$calendar_id=1;}

		// $this->load->model('tbl_star_model', 'star'); 
  //       $rtn_arr = $this->star->insert_update_chck($exm,$calendar_id,$userid);
  //       if(count($rtn_arr)>=1)
  //       {
  //           //アップデート
  //           // print_r($rtn_arr);
  //           foreach ($rtn_arr as $key1 => $value1)
  //           {
  //               foreach ($value1 as $key2 => $value2)
  //               {
  //                   if($key2=='starflg'){$starflg=$value2;}
  //                   if($key2=='id'){$id=$value2;}
  //               }
  //           }
  //           $rtn_id = $this->star->update($exm,$calendar_id,$userid,$id,$starflg);
  //       }else{
  //           $rtn_id = $this->star->insert($exm,$calendar_id,$userid);          
  //       }      

  //       echo $rtn_id;

		$data = array(
		 	'title' => 'テスト',
		 	'note' => '・テスト'
            );
		$this->load->view('include/header',$data);
		$this->load->view('test',$data);
		// $this->load->view('welcome',$data);
		$this->load->view('include/footer',$data);
	}
}