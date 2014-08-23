<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
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