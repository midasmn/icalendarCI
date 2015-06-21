<?php
class Tbl_ymd_model extends MY_Model {

    // カラムを public フィールドとして定義
    public $calendar_id;
    public $yyyy;
    public $mm;
    public $dd;
    public $name;
    public $img_path;
    public $img_alt;
    public $href;
    public $order;
    // public $createdate;
    // public $updatedate;

    public function __construct() {
        parent::__construct();
    }
    //カレンダー別月別($calendar_id,$yyyy,$mm)
    public function find_month_list($calendar_id,$yyyy,$mm) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.dd as dd');
        $this->db->select('tbl_ymd.img_path as img_path');
        $this->db->select('tbl_ymd.img_alt as img_alt');
        $this->db->select('tbl_ymd.description as ymd_description');
        $this->db->from('tbl_ymd');
        $this->db->where('tbl_ymd.calendar_id', $calendar_id); 
        $where = "(`yyyy` = ".$yyyy." or  `yyyy` = 9999 )";
        $this->db->where($where); 
        $this->db->where('tbl_ymd.mm', $mm); 
        $this->db->where('tbl_ymd.order', 1); 
        $this->db->group_by('tbl_ymd.dd');
        $this->db->order_by('tbl_ymd.dd','asc'); 

        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //カレンダー別日別($calendar_id,$yyyy,$mm,$dd)
    public function find_day_list($calendar_id,$yyyy,$mm,$dd) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.img_path as img_path');
        $this->db->select('tbl_ymd.img_alt as img_alt');
        $this->db->select('tbl_ymd.name as name');
        $this->db->select('tbl_ymd.href as href');
        $this->db->select('tbl_ymd.description as ymd_description');
        $this->db->from('tbl_ymd');
        $this->db->where('tbl_ymd.calendar_id', $calendar_id); 
        $where = "(`yyyy` = ".$yyyy." or  `yyyy` = 9999 )";
        $this->db->where($where); 
        $this->db->where('tbl_ymd.mm', $mm); 
        $this->db->where('tbl_ymd.dd', $dd); 
        $this->db->group_by('tbl_ymd.order');
        $this->db->order_by('tbl_ymd.order','asc'); 

        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    public function count_ymd_all() {
        // $this->db->start_cache();
        $this->db->select('COUNT(*) as ymdcnt');
        $this->db->from('tbl_ymd');
        // $this->db->where('onflg', 'ON'); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    public function count_day_all() {
        // $this->db->start_cache();
        // $this->db->select('COUNT(calendar_id) as daycnt');
        $this->db->select('COUNT(*) as daycnt');
        $this->db->from('tbl_ymd');
        $this->db->where('order', 1); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //OGタグ要画像
    public function get_ogimage($calendar_id,$yyyy,$mm,$dd) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.img_path as img_path');
        $this->db->from('tbl_ymd');
        $this->db->where('tbl_ymd.calendar_id', $calendar_id); 
        $this->db->where('tbl_ymd.yyyy', $yyyy); 
        $this->db->where('tbl_ymd.mm', $mm); 
        $this->db->where('tbl_ymd.dd', $dd); 
        $this->db->where('tbl_ymd.order', 1);
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //カレンダー別月別($calendar_id,$yyyy,$mm)
    public function find_month_listR($calendar_id,$yyyy,$mm,$orderno) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.dd as dd');
        $this->db->select('tbl_ymd.img_path as img_path');
        $this->db->select('tbl_ymd.img_alt as img_alt');
        $this->db->select('tbl_ymd.description as ymd_description');
        $this->db->from('tbl_ymd');
        $this->db->where('tbl_ymd.calendar_id', $calendar_id); 
        $where = "(`yyyy` = ".$yyyy." or  `yyyy` = 9999 )";
        $this->db->where($where); 
        $this->db->where('tbl_ymd.mm', $mm); 
        $this->db->where('tbl_ymd.order', $orderno); 
        $this->db->group_by('tbl_ymd.dd');
        $this->db->order_by('tbl_ymd.dd','asc'); 

        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //
    public function max_day_order($calendar_id,$yyyy,$mm) {
        // $this->db->start_cache();
        // $this->db->select('COUNT(calendar_id) as daycnt');
        $this->db->select('max(`order`) as maxdayorder');
        $this->db->from('tbl_ymd');
        $this->db->where('calendar_id', $calendar_id); 
        $this->db->where('yyyy', $yyyy); 
        $this->db->where('mm', $mm); 
        // $this->db->where('tbl_ymd.dd', $dd); 
        $query = $this->db->get();
// echo $this->db->last_query();
        return $query->result();
    }
    //検索リスト
    public function search_keyword($keyword,$limit,$offset) {
        $this->db->start_cache();
        $this->db->select('calendar_id as key_calid');
        $this->db->select('yyyy as key_yyyy');
        $this->db->select('mm as key_mm');
        $this->db->select('dd as key_dd');
        $this->db->select('img_path as key_img_path');
        $this->db->select('order as key_order');
        $this->db->from('tbl_ymd');
        // $st="";
        // $st = 'FIND_IN_SET("'.$keyword.'", img_alt)';
        // $this->db->where($st);

        $this->db->like('img_alt', $keyword, 'both'); 


        $this->db->order_by('yyyy','desc'); 
        $this->db->order_by('mm','desc'); 
        $this->db->order_by('dd','desc'); 
        if(!$offset){$offset=1;}
        // $this->db->limit($limit,$offset);
        $query = $this->db->get();
        // return $query->result();
        return $query->result_array();
    }
    //検索リストR
    public function search_keywordR($keyword,$limit,$offset) {
        // $this->db->start_cache();
        $this->db->select('tbl_ymd.img_path as key_img_path');
        $this->db->select('tbl_ymd.calendar_id as key_calendar_id');
        $this->db->select('tbl_ymd.yyyy as key_yyyy');
        $this->db->select('tbl_ymd.mm as key_mm');
        $this->db->select('tbl_ymd.dd as key_dd');
        $this->db->select('tbl_ymd.name as key_name');
        $this->db->select('tbl_ymd.img_alt as key_img_alt');
        $this->db->select('tbl_ymd.order as key_order');

        $this->db->from('tbl_ymd');
        $this->db->join('tbl_ymd_morpheme', 'tbl_ymd.id = tbl_ymd_morpheme.ymdid', 'inner');
        $this->db->like('tbl_ymd_morpheme.tag', $keyword, 'both'); 
        // $this->db->order_by('tbl_ymd.yyyy','desc'); 
        $this->db->order_by('tbl_ymd_morpheme.ymdid','desc'); 
        // if(!$offset){$offset=1;}
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        // return $query->result();
// echo $this->db->last_query();
        return $query->result_array();
    }
    //検索リストR
    public function search_keywordR_all($keyword) {
        // $this->db->start_cache();
        $this->db->select('COUNT(tbl_ymd.id) as total_cnt');
        $this->db->from('tbl_ymd');
        $this->db->join('tbl_ymd_morpheme', 'tbl_ymd.id = tbl_ymd_morpheme.ymdid', 'inner');
        $this->db->like('tbl_ymd_morpheme.tag', $keyword, 'both'); 
        // $this->db->order_by('tbl_ymd.yyyy','desc'); 
        $query = $this->db->get();

    // echo $this->db->last_query();
        // return $query->result();
        return $query->result_array();
    }
    



}
?>