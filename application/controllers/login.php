<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library("form_validation");    //フォームバリデーションライブラリを読み込む。
        $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data = array(
            'title' => 'ログイン',
            'note' => 'ログイン'
            );
        // ログインセッション
        if($this->session->userdata("is_logged_in")){   //ログインしている場合の処理
            // $data['userid'] = $userid;
            $data['userid'] = $this->session->userdata("userid");
            $data['status'] = $this->session->userdata("status");
            $data['profile_img'] = $this->session->userdata("profile_img");
            // $date[''] = $
        }else{
            $userid = -1;
        }
        // ログインセッション
        $this->load->view('include/header',$data);
        $this->load->view('login',$data);
        $this->load->view('include/footer',$data);
    }
    public function login_validation()
    {
        
        $this->form_validation->set_rules("password", "パスワード", "required|md5|trim");
        $this->form_validation->set_rules("email", "メール", "required|trim|xss_clean|valid_email|callback_validate_credentials");
        // validate_credentialsというファンクションを呼び出します。
        if($this->form_validation->run())
        {  //バリデーションエラーがなかった場合の処理

            //testデータ
            $userid = "99";
            $profile_img = "http://bootsnipp.com/img/avatars/1392936b2a44e53420370564ffec3377f26d27da.jpg";
            //testデータ
            $data = array(
                "email" => $this->input->post("email"),
                "is_logged_in" => 1,
                "status" => "LOGIN",
                "userid" => $userid,
                "profile_img" => $profile_img
                );
                $this->session->set_userdata($data);



            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            redirect("/supportform/");
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
        $this->load->model("tbl_user_model",'user');

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