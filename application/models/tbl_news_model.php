<?php
class Tbl_news_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }
    //id降順limit1
    // about privacy terms
    public function get_list() {
        $this->db->start_cache();
        $this->db->select('id');
        $this->db->select('date');
        $this->db->select('url');
        $this->db->select('headline');
        $this->db->from('tbl_news');
        $this->db->order_by('id','desc'); 
        // $this->db->limit(1);
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }

}
?>