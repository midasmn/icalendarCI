<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->helper('form');
        // $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data = array(
            'title' => 'ログイン',
            'note' => 'ログイン'
            );
        // ログインセッション
        if($this->session->flashdata('redirect_url'))
        {
            $url = $this->session->flashdata('redirect_url');
            //リダイレクト用URL
            $this->session->set_flashdata('redirect_url', $url);
            // $this->session->set_flashdata('redirect_url', uri_string());
            //リダイレクト用URL
        }
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

            // // testデータ
            // $userid = "99";
            // $profile_img = "http://bootsnipp.com/img/avatars/1392936b2a44e53420370564ffec3377f26d27da.jpg";
            //testデータ
            $this->load->model("tbl_user_model","user");
            $userdata['tbl_user'] = $this->user->get_userdata($this->input->post("email"));
            foreach ($userdata['tbl_user'] as $row) {$profile_img = $row->user_profile;$userid = $row->user_id;}

// echo $userid;

// print_r($userdate);
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
        redirect ("/login/");        //ログインページにリダイレクトする
    }
}

?>