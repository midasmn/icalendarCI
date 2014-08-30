<?php
class Tbl_star_model extends MY_Model {

    // カラムを public フィールドとして定義
    // public $createdate;
    // public $updatedate;

    public function __construct() {
        parent::__construct();
    }
    //お気に入り追加
    // exm = calendar ＝カレンダー
    //       item = アイテムID
    // 
    public function insert_update_chck($exm,$itemid,$userid) {
        //処理判断
        $this->db->select('id');
        $this->db->from('tbl_star');
        $this->db->where('exm', $exm); 
        $this->db->where('itemid', $itemid); 
        $this->db->where('userid', $userid); 
        $query = $this->db->get();
        $sw = $query->num_rows();
        if($sw>=1)
        {
            //アップデート
            return  "UP";
        }else{
            //インサート
            return  "IN";
        }
    }
    public function insert($exm,$itemid,$userid) {
        //インサート
        $data = array('exm' => $exm ,'itemid' => $itemid ,'userid' => $userid);
        $this->db->insert('tbl_star', $data); 
        return  $this->db->insert_id();
        // return $sw;
    }
    public function update($exm,$itemid,$userid,$id) {
        //アップデート
        $now = $this->now();
        $data = array(
           'exm' => $exm,
           'itemid' => $itemid,
           'userid' => $userid,
           'updatedate' => $now
        );
        $this->db->where('id', $sw);
        $this->db->update('tbl_star', $data); 
        return  $id;
    }
}
?>