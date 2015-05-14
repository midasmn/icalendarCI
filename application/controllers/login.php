<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->config->load('icalendar');
        $this->load->helper('form');
        // $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data = array();
        //OGタグ
        // $data['og_title'] = $this->config->item('og_title', 'icalendar');
        $data['og_title'] = 'ログイン - iCalendar.xyz';
        $data['og_image'] = $this->config->item('og_image', 'icalendar');
        $data['og_url'] = $this->config->item('og_url', 'icalendar');
        $data['og_description'] = $this->config->item('og_description', 'icalendar');
        //
        $data['title'] = $this->config->item('title', 'icalendar');
        $data['description'] = $this->config->item('description', 'icalendar');
        $data['keywords'] = $this->config->item('keywords', 'icalendar');

        // ログインセッション
        if($this->session->flashdata('redirect_url'))
        {
            $url = $this->session->flashdata('redirect_url');
            //リダイレクト用URL
            $this->session->set_flashdata('redirect_url', $url);
            // $this->session->set_flashdata('redirect_url', uri_string());
            //リダイレクト用URL
        }
        $this->load->model('tbl_calendar_model', 'calendar'); //アイテム
        $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
        $data['calcnt'] = $this->calendar->count_calist_all();
        $data['daycnt'] = $this->ymd->count_day_all();
        $data['ymdcnt'] = $this->ymd->count_ymd_all();
        // // ログインセッション
        $this->load->view('include/header',$data);
        $this->load->view('login',$data);
        $this->load->view('include/footer',$data);
    }
    public function login_validation()
    {
        $this->load->library("form_validation");    //フォームバリデーションライブラリを読み込む。
        $this->form_validation->set_rules("password", "パスワード", "required|md5|trim");
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim|xss_clean|valid_email|callback_validate_credentials");
        // $this->form_validation->set_rules("email", "メール", "required|trim|xss_clean|callback_validate_credentials");

        // validate_credentialsというファンクションを呼び出します。
        if($this->form_validation->run())
        {  //バリデーションエラーがなかった場合の処理
            $this->load->model("tbl_user_model","user");
            $userdata['tbl_user'] = $this->user->get_userdata($this->input->post("email"));
            foreach ($userdata['tbl_user'] as $row) {$profile_img = $row->user_profile;$userid = $row->user_id;}
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');
            $data = array(
                "email" => $this->input->post("email"),
                "is_logged_in" => 1,
                "status" => "LOGIN",
                "userid" => $userid,
                "profile_img" => $profile_img,
                "remember" => $remember
                );
                $this->session->set_userdata($data);
            

            // // redirect("/faq/");
            // $this->load->view('include/header',$data);
            // $this->load->view('include/footer',$data);
            //リダイレクト
            if($this->session->flashdata('redirect_url'))
            {
                $url = $this->session->flashdata('redirect_url');
                redirect($url);
            }else{
                redirect("/",'refresh');
            }
            //リダイレクト
        }else{                          //バリデーションエラーがあった場合の処理
            $data = array(
            'title' => 'ログイン-エラー',
            'note' => 'ログイン',
            'message' => 'loginerr'
            );
            $this->load->model('tbl_calendar_model', 'calendar'); //アイテム
            $this->load->model('tbl_ymd_model', 'ymd'); //アイテム
            $data['calcnt'] = $this->calendar->count_calist_all();
            $data['daycnt'] = $this->ymd->count_day_all();
            $data['ymdcnt'] = $this->ymd->count_ymd_all();
            // $data['message'] = validation_errors();
            $this->load->view('include/header',$data);
            $this->load->view('login',$data);
            $this->load->view('include/footer',$data);
        }
    }
    public function validate_credentials()
    {     //Email情報がPOSTされたときに呼び出されるコールバック機能
        $this->load->model("tbl_user_model","user");
        if($this->user->can_log_in()){   //ユーザーがログインできたあとに実行する処理
            return true;
        }else{                  //ユーザーがログインできなかったときに実行する処理
            $this->form_validation->set_message("validate_credentials", "ユーザー名かパスワードが異なります。");
            return false;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();     //セッションデータの削除
        session_destroy();
        redirect ("/login/");        //ログインページにリダイレクトする
    }
}

?>