<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        # 2番目のURIセグメントより、処理由来を取得します。セグメントデータがない
        # 場合は、1を設定します。
        $exm = (int) $this->uri->segment(2, 1);
        # 3番目のURIセグメントより、アイテムIDを取得します。セグメントデータがない
        # 場合は、1を設定します。
        $itemid = (int) $this->uri->segment(3, 1);
        # 4番目のURIセグメントより、店舗IDを取得します。セグメントデータがない
        # 場合は、1を設定します。
        $exmshopid = (int) $this->uri->segment(4, 0);
    }

    public function index()
    {
        $data = array(
            'title' => 'カレンダー追加',
            'note' => 'カレンダー追加'
            );

        // $this->load->model('tbl_calendar_model', 'calendar');
        // $this->calendar->name = $this->input->post('name');

        $this->load->view('include/header',$data);
        $this->load->view('add',$data);
        $this->load->view('include/footer',$data);
    }
}