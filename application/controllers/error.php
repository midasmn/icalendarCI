<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Error extends CI_Controller {
	/**
	 * コンストラクタ
	 */
	function __construct(){
		parent::__construct();

		$this->output->enable_profiler(TRUE);
	}
	/**
	 * エラー画面を表示
	 */
	function error_404() {
		//$route['404_override'] = 'error/error_404';
		$this->output->set_status_header('404');
		$this->load->view('error/404');
	}
}