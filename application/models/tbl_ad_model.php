<?php
class Tbl_ad_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    public function insert($arr_item) {
        // $this->db->start_cache();
        // $now = $this->now();
        // $this->db->set(array('created_at' => $now, 'updated_at' => $now));
        // $this->db->set(array('exm' => $exm, 'itemid' => $itemid, 'userid' => $userid);
        // $this->db->set($array);
        $ret = $this->db->insert('tbl_ad', $arr_item); 
        if ($ret === FALSE) {
            return FALSE;
        }
// echo $this->db->last_query();
        return  $this->db->insert_id();
    }
    //取得
    public function get_ad_list($calid,$positon) {
        $this->db->start_cache();
        $this->db->select('src as ad_src');
        $this->db->from('tbl_ad');
        $this->db->where('calid', $calid); 
        $this->db->where('position', $positon); 
        $this->db->where('onflg', 'ON'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
}
?>