<?php
class Tbl_calendar_model extends MY_Model {

    // カラムを public フィールドとして定義
    public $title;
    public $tags;
    public $description;
    public $dd;
    public $sc_url;
    public $sc_tag;
    public $img_alt;
    public $img_url;
    public $img_tag;
    public $status;
    public $onflg;
    public $order;
    public $author_id;
    // public $createdate;
    // public $updatedate;

    public function __construct() {
        parent::__construct();
    }
    //カレンダーリスト全件
    public function find_calist_all() {
        $this->db->start_cache();
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->from('tbl_calendar');
        $this->db->where('tbl_calendar.onflg', 'ON'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //カレンダーリストオブジェクト(smart,newer,random)
    public function find_calist($sort,$limit,$offset) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.img_path as cal_img');
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->select('tbl_calendar.title as cal_title');
        $this->db->select('tbl_calendar.tags as cal_tags');
        $this->db->select('tbl_calendar.description as cal_description');
        $this->db->from('tbl_calendar');
        $this->db->from('tbl_ymd');
        $this->db->where("tbl_ymd.calendar_id = tbl_calendar.id"); 
        $this->db->where('tbl_calendar.onflg', 'ON'); 
        $this->db->where('tbl_ymd.keyimg', "KEY"); 
        $this->db->group_by('tbl_ymd.calendar_id');
        //
        if($sort=='smart'){
            $this->db->order_by('tbl_calendar.order asc'); 
        }elseif($sort=='newer'){
            $this->db->order_by('tbl_calendar.id desc'); 
        }elseif($sort=='random'){
            $this->db->order_by('rand()'); 
        }
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
        // return $query->result_array();
    }
    //カレンダーリスト配列(smart,newer,random)
    public function find_calist_arr($sort,$limit,$offset) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.img_path as cal_img');
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->select('tbl_calendar.title as cal_title');
        $this->db->select('tbl_calendar.tags as cal_tags');
        $this->db->select('tbl_calendar.description as cal_description');
        $this->db->from('tbl_calendar');
        $this->db->from('tbl_ymd');
        $this->db->where("tbl_ymd.calendar_id = tbl_calendar.id"); 
        $this->db->where('tbl_calendar.onflg', 'ON'); 
        $this->db->where('tbl_ymd.keyimg', "KEY"); 
        $this->db->group_by('tbl_ymd.calendar_id');
        //
        if($sort=='smart'){
            $this->db->order_by('tbl_calendar.order asc'); 
        }elseif($sort=='newer'){
            $this->db->order_by('tbl_calendar.id desc'); 
        }elseif($sort=='random'){
            $this->db->order_by('rand()'); 
        }
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
// echo $this->db->last_query();
        // return $query->result();
        return $query->result_array();
    }
    //カレンダー情報
    public function get_calist_info($calendar_id) {
        $this->db->start_cache();
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->select('tbl_calendar.title as cal_title');
        $this->db->select('tbl_calendar.tags as cal_tags');
        $this->db->select('tbl_calendar.description as cal_description');
        $this->db->from('tbl_calendar');
        $this->db->where('tbl_calendar.id', $calendar_id); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //お気に入りカレンダー取得
    public function find_favorites_arr($userid) {
        // $this->db->start_cache();
        $this->db->select('tbl_star.starflg as starflg');
        $this->db->select('tbl_ymd.img_path as cal_img');
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->select('tbl_calendar.title as cal_title');
        $this->db->select('tbl_calendar.tags as cal_tags');
        $this->db->select('tbl_calendar.description as cal_description');
        $this->db->from('tbl_calendar');
        $this->db->from('tbl_ymd');
        $this->db->from('tbl_star');
        $this->db->where("tbl_ymd.calendar_id = tbl_calendar.id"); 
        $this->db->where("tbl_star.itemid = tbl_calendar.id"); 
        $this->db->where('tbl_calendar.onflg', 'ON'); 
        $this->db->where('tbl_ymd.keyimg', "KEY"); 
        $this->db->where('tbl_star.starflg', "ON"); 
        $this->db->where('tbl_star.userid', $userid); 
        $this->db->order_by('tbl_calendar.id desc'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        // return $query->result();
        return $query->result_array();
    }
}
?>