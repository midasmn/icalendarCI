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
}
?>