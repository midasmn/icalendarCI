<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staticpages extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function about()
	{
		$data = array(
		 	'title' => 'iCalendarついてR',
		 	'note' => 'iCalendarついて'
            );

		$this->load->view('include/header',$data);
		$this->load->view('about',$data);
		$this->load->view('include/footer',$data);
	}
	public function terms()
	{
		// $this->output->cache(3600); //キャッシュ
		$data = array(
			'title' => '利用規約',
		 	'note' => '利用規約'
            );

		$this->load->view('include/header',$data);
		$this->load->view('terms',$data);

		$this->load->view('include/footer',$data);
	}
	public function privacy()
	{
		// $this->output->cache(3600); //キャッシュ
		$data = array(
			'title' => 'プライバシーポリシー',
		 	'note' => 'プライバシーポリシー'
            );

		$this->load->view('include/header',$data);
		$this->load->view('privacy',$data);
		$this->load->view('include/footer',$data);
	}
	public function faq()
	{
		// $this->output->cache(3600); //キャッシュ
		$data = array(
			'title' => 'FAQ',
		 	'note' => 'よくある質問(FAQ)'
            );

		$this->load->view('include/header',$data);
		$this->load->view('faq');
		$this->load->view('include/footer',$data);
	}
	public function supportform()
	{
		// $this->output->cache(3600); //キャッシュ
		$data = array(
			'title' => 'お問い合わせフォーム',
		 	'note' => 'お問い合わせフォーム'
            );

		$this->load->view('include/header',$data);
		$this->load->view('supportform',$data);
		$this->load->view('include/footer',$data);
	}
}