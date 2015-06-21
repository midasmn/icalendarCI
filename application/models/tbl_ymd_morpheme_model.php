<?php
class Tbl_ymd_morpheme_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    //検索リスト全件
    public function search_keywordR_all($keyword) {
        $this->db->start_cache();
        $this->db->select('COUNT(*) as total_cnt');
        $this->db->from('tbl_ymd_morpheme as tmm');
        $this->db->like('tag', $keyword, 'both'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
}
?>
