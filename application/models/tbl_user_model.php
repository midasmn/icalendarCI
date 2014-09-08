<?php
class Tbl_user_model extends MY_Model {
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
    public function can_log_in()
    {   //can_log_inファンクションを作っていく

        $this->db->where("email", $this->input->post("email")); //POSTされたemailデータとDB情報を照合する
        $this->db->where("password", md5($this->input->post("password")));  //POSTされたパスワードデータとDB情報を照合する
        $query = $this->db->get("tbl_user");

        if($query->num_rows() == 1){    //ユーザーが存在した場合の処理
            // return true;
            return $query->result_array();
        }else{                  //ユーザーが存在しなかった場合の処理
            return false;
        }
    }

    public function get_userdata($email)
    {   //can_log_inファンクションを作っていく
        $this->db->select('id as user_id');
        $this->db->select('username as user_username');
        $this->db->select('profile as user_profile');
        $this->db->where("email", $email); //POSTされたemailデータとDB情報を照合する
        // $this->db->where("password", md5($password));  //POSTされたパスワードデータとDB情報を照合する
        $query = $this->db->get("tbl_user");
        return $query->result();
        // return $query->result_array();
    }



    public function add_temp_user($key)
    {
        //add_temp_usersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
        //add_temp_usersモデルの実行時に、以下のデータを取得して、$dataと紐づける
        $data=array(        
            "email"=>$this->input->post("email"),
            "password"=>md5($this->input->post("password")),
            "key"=>$key
        );

        //$dataをDB内のtemp_usersに挿入したあとに、$queryと紐づける
        $query=$this->db->insert("tbl_temp_user", $data);

        if($query)
        {     //データ取得が成功したらTrue、失敗したらFalseを返す
            return true;
        }else{
            return false;
        }
    }

    // $this->tbl_user_model->is_valid_key($key)

    public function is_valid_key($key)
    {
        $this->db->where("key", $key);  // $keyと等しいレコードを指定
        $query = $this->db->get("tbl_temp_user");      //temp_userテーブルから情報を取得

        if($query->num_rows() == 1)
        {
            return true;
        }else{
            return false;
        }
    }


    //ユーザテーブル登録
    public function add_user($key)
    {
        //keyのテーブルを選択
        $this->db->where("key", $key);
        //temp_usersテーブルからすべての値を取得
        $temp_user = $this->db->get("tbl_temp_user");

        if($temp_user)
        {
            $row = $temp_user->row();
        //     //$rowでは、temp_usersの行を返します。
        //     //しかし、このままでは1行目のみが返されるので、さらに以下を追記する。
             //$rowで取得した値のうち、必要な情報のみを取得する
            $data = array( 
                "email" => $row->email,
                "password" => $row->password
            );
            $did_add_user = $this->db->insert("tbl_user", $data);
        }
 // echo $this->db->last_query();

         if($did_add_user)
        {      //did_add_userが成功したら以下を実行
            $this->db->where("key", $key);
            $this->db->delete("tbl_temp_user");
            // return true;
            return $data["email"];  //emailの値を返す
        }return false;
   
    }
}
?>