<?php
class Tbl_ad_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    public function insert($arr_item) {
        $ret = $this->db->insert('tbl_ad', $arr_item); 
        if ($ret === FALSE) {
            return FALSE;
        }
// echo $this->db->last_query();
        return  $this->db->insert_id();
    }
    //取得
    public function get_ad_list($calid,$positon) {
        // $this->db->start_cache();
        $this->db->select('tbl_ad.src as ad_src');
        $this->db->from('tbl_ad');
        $this->db->where('tbl_ad.calid', $calid); 
        $this->db->where('tbl_ad.position', $positon); 
        $this->db->where('tbl_ad.onflg', 'ON'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
}
?>