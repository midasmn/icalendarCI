<?php
class Tbl_temp_user_model extends MY_Model {

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
        $ret = $this->db->insert('tbl_temp_user', $arr_item); 
        if ($ret === FALSE) {
            return FALSE;
        }
// echo $this->db->last_query();
        return  $this->db->insert_id();
    }

}
?>