<?php
class Tbl_count_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    //取得
    public function get_count() {
        // $this->db->start_cache();
        $this->db->select('category_cnt as category_cnt');
        $this->db->select('day_cnt as day_cnt');
        $this->db->select('item_cnt as item_cnt');
        $this->db->from('tbl_count');
        $query = $this->db->get();
// echo $this->db->last_query();
        // return $query->result();
        return $query->result_array();
    }
}
?>