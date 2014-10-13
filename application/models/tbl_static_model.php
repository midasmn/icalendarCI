<?php
class Tbl_static_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }
    //id降順limit1
    // about privacy terms
    public function get_description($title) {
        // $this->db->start_cache();
        $this->db->select('description as description');
        $this->db->from('tbl_static');
        $this->db->where('title', $title); 
        $this->db->order_by('id','desc'); 
        $this->db->limit(1);
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }

}
?>