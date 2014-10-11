<?php
class Tbl_calendar_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }
    //カレンダーリスト全件
    public function find_calist_all() {
        // $this->db->start_cache();
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->select('tbl_calendar.title as cal_title');
        $this->db->select('tbl_calendar.group as cal_group');
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
        $this->db->select('tbl_ymd.description as ymd_description');
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
    //検索リスト全件
    public function search_calist_all($arr_tag) {
        // $this->db->start_cache();


        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->from('tbl_calendar');
        $this->db->where('tbl_calendar.onflg', 'ON'); 
        $cnt = count($arr_tag);
        if($cnt>0)
        {
            for($i=0;$i<$cnt;$i++)
            {
                $st="";
                $st = 'FIND_IN_SET("'.$arr_tag[$i].'", tbl_calendar.tags)';
                $this->db->where($st);
            }
        }
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //検索リスト
    public function search_calist_arr($arr_tag,$sort,$limit,$offset) {
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
        //
        $cnt = count($arr_tag);
        if($cnt>0)
        {
            for($i=0;$i<$cnt;$i++)
            {
                $st="";
                $st = 'FIND_IN_SET("'.$arr_tag[$i].'", tbl_calendar.tags)';
                $this->db->where($st);
            }
        }
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
        // $this->db->start_cache();
        $this->db->select('tbl_calendar.id as cal_id');
        $this->db->select('tbl_calendar.title as cal_title');
        $this->db->select('tbl_calendar.tags as cal_tags');
        $this->db->select('tbl_calendar.description as cal_description');
        $this->db->select('tbl_calendar.group as cal_group');
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
    //メニューバー用お気に入りカレンダー取得
    public function menu_favorites_arr($userid) {
        $this->db->select('tbl_calendar.id as m_cal_id');
        $this->db->select('tbl_calendar.title as m_cal_title');
        $this->db->from('tbl_calendar');
        $this->db->from('tbl_star');
        $this->db->where("tbl_star.itemid = tbl_calendar.id"); 
        $this->db->where('tbl_calendar.onflg', 'ON');  
        $this->db->where('tbl_star.starflg', "ON"); 
        $this->db->where('tbl_star.userid', $userid); 
        $this->db->group_by('tbl_calendar.id');
        $this->db->order_by('tbl_star.updatedate desc'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
        // return $query->result_array();
    }
    public function count_calist_all() {
        // $this->db->start_cache();
        $this->db->select('COUNT(*) as calcnt');
        $this->db->from('tbl_calendar');
        $this->db->where('onflg', 'ON'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
}
?>