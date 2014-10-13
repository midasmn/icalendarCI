<?php
class Tbl_faq_model extends MY_Model {

    // カラムを public フィールドとして定義
    // public $calendar_id;
    // public $yyyy;
    // public $mm;
    // public $dd;
    // public $name;
    // public $img_path;
    // public $img_alt;
    // public $href;
    // public $order;
    // // public $createdate;
    // // public $updatedate;

    public function __construct() {
        parent::__construct();
    }
    public function insert($arr_item) {
        // $this->db->start_cache();
        // $now = $this->now();
        // $this->db->set(array('created_at' => $now, 'updated_at' => $now));
        // $this->db->set(array('exm' => $exm, 'itemid' => $itemid, 'userid' => $userid);
        // $this->db->set($array);
        $ret = $this->db->insert('tbl_faq', $arr_item); 
        if ($ret === FALSE) {
            return FALSE;
        }
// echo $this->db->last_query();
        return  $this->db->insert_id();
    }
    //取得
    public function get_faq_list() {
        // $this->db->start_cache();
        $this->db->select('title as faq_title');
        $this->db->select('faq as faq_faq');
        $this->db->select('order as faq_order');
        $this->db->from('tbl_faq');
        $this->db->where('onflg', 'ON'); 
        $this->db->order_by('order','asc'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }

}
?>