<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class  Favorites extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $userid=-1;
        $data = array();
        // ログインセッション
        if($this->session->userdata("is_logged_in")){   //ログインしている場合の処理
            $email=$this->session->userdata("email");
            $userid=$this->session->userdata("userid");
            $status=$this->session->userdata("status");
            $profile_img=$this->session->userdata("profile_img");
            $remember=$this->session->userdata("remember");
            //
            $data['email'] = $email;
            $data['userid'] = $userid;
            $data['status'] = $status;
            $data['profile_img'] = $profile_img;
            $data['remember'] = $remember;
        }
        // ログインセッション
        $exm=$this->uri->segment(1);    //一覧ソートセグメント
        // スター
        $this->load->model('tbl_star_model', 'star'); //ログ
        $data['star'] = $this->star->get_calendar_starlist($userid) ;
        // スター
        $data['title'] = "画像で振り返る、あの日の記録 - イメージカレンダー : iCalendar.xyz.";
        // ogタグ初期値
        $data['og_title'] = $data['title'];
        $data['og_image'] = "http://icalendar.xyz/iTunesArtwork-512.jpg" ;
        $data['og_url'] = "http://icalendar.xyz" ;
        $data['og_description'] = "あの日の出来事を日付ごとの画像カレンダーで振り返れます。" ;
        // ogタグ
        // カレンダーテーブル
        $this->load->model('tbl_calendar_model', 'calendar');
        /////// ログ
        $this->load->model('tbl_log_model', 'logr'); //ログ
        $logdata = array( 'userid' => $userid, 'item1' => $exm );
        $rtn = $this->logr->insert($logdata);
        /////// ログ
        $data['calist'] = $this->calendar->find_favorites_arr($userid);
        //メニューお気に入りセレクト
        if($userid<>-1){
            $data['menu'] = $this->calendar->menu_favorites_arr($userid);
        }
        //メニューお気に入りセレクト
        $this->load->view('include/header',$data);
        $this->load->view('favorites',$data);
        $this->load->view('include/footer',$data);
    }
}