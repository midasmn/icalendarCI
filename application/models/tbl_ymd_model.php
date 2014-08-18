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

}
?>