<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');

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
        $data = array();
        $data['title'] ='Mittelloge';


    }


    public function sample() {
        // validation などは割愛
        $this->load->model('sample_model', 'sample');
        $this->sample->name = $this->input->post('name');
        $this->sample->address = $this->input->post('address');
        $this->sample->insert();
    }
}