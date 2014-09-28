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
        //処理判断starFlg
        $this->db->select('id');
        $this->db->select('starflg');
        $this->db->from('tbl_star');
        $this->db->where('exm', $exm); 
        $this->db->where('itemid', $itemid); 
        $this->db->where('userid', $userid); 
        $query = $this->db->get();
        // $sw = $query->num_rows();
        return $query->result_array();
        // return  $query->result();
        // $sw = return  $sw;
    }
    public function insert($exm,$itemid,$userid,$starflg) {
        //インサート
        $now = $this->now();
        // $data = array('exm' => $exm ,'itemid' => $itemid ,'userid' => $userid,'createdate' => $now);
        $data = array('exm' => $exm ,'itemid' => $itemid ,'userid' => $userid,'createdate' => $now);
        $this->db->insert('tbl_star', $data); 
        return  $this->db->insert_id();
        // return $sw;
    }
    public function update($exm,$itemid,$userid,$id,$wherestarflg) {
        //アップデート
        $now = $this->now();
        if($wherestarflg=="ON"){$starflg="OFF";}else{$starflg="ON";}
        $data = array(
           'exm' => $exm,
           'itemid' => $itemid,
           'userid' => $userid,
           'starflg' => $starflg,
           'updatedate' => $now
        );
        $this->db->where('id', $id);
        $this->db->where('starflg', $wherestarflg);
        $this->db->update('tbl_star', $data); 
        return  $id;
    }
    // calendarページ用
    public function get_calendar_starflg_read($exm,$itemid,$userid) {
        //処理判断starFlg
        $this->db->select('starflg');
        $this->db->from('tbl_star');
        $this->db->where('exm', $exm); 
        $this->db->where('itemid', $itemid); 
        $this->db->where('userid', $userid); 
        $query = $this->db->get();  
        // return  $query->result();
        return  $query->result_array();
    }
    // cal一覧用
    public function get_calendar_starlist($userid) {
        //処理判断starFlg
        $this->db->select('itemid');
        $this->db->from('tbl_star');
        $this->db->where('exm', "calendar"); 
        $this->db->where('starflg', "ON"); 
        $this->db->where('userid', $userid); 
        $query = $this->db->get();
        // return  $query->result();
        return  $query->result_array();
    }
}
?>