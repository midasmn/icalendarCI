<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
		$this->load->helper('file');
	}

	public function index()
	{
		$data = array();
		$calendar_id = 107;
		$yyyy = 2014;
		$mm = 10;

		$cal_th = 'application/img/cal_th/'.$yyyy.$mm.'/'.$calendar_id.'_'.$yyyy.'_'.$mm.'.png';
echo $cal_th;
		$rtn = read_file($cal_th);
		if($rtn )
		{
			echo "OK";
			$cal_th_img = base_url('application/img/cal_th/'.$yyyy.$mm.'/'.$calendar_id.'_'.$yyyy.'_'.$mm.'.png');
			echo $cal_th_img;
			$data['og_image'] = $cal_th_img;
		}


		// echo '<img src="'.$cal_th_img.'">';
// 		$cal_th_img = "tttt";


// echo $cal_th_img;

// 		$data = array(
// 		 	'title' => 'テスト',
// 		 	'note' => '・テスト',
// 		 	'cal_th' => $cal_th_img;
//             );
		$this->load->view('include/header',$data);
		// $this->load->view('test',$data);
		// $this->load->view('welcome',$data);
		$this->load->view('include/footer',$data);
	}
}