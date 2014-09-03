<?php
class Tbl_user_model extends MY_Model {

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
        $ret = $this->db->insert('tbl_user', $arr_item); 
        if ($ret === FALSE) {
            return FALSE;
        }
// echo $this->db->last_query();
        return  $this->db->insert_id();
    }
    public function can_log_in(){   //can_log_inファンクションを作っていく

        $this->db->where("email", $this->input->post("email")); //POSTされたemailデータとDB情報を照合する
        $this->db->where("password", md5($this->input->post("password")));  //POSTされたパスワードデータとDB情報を照合する
        $query = $this->db->get("tbl_user");

        if($query->num_rows() == 1){    //ユーザーが存在した場合の処理
            return true;
        }else{                  //ユーザーが存在しなかった場合の処理
            return false;
        }
    }
}

}
?>