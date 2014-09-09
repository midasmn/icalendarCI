<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Password extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }
    public function index()
    {
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
        $data = array(
            'title' => 'パスワードを再設定する',
            'note' => 'パスワードを再設定する'
            );
        $this->load->view('include/header',$data);
        $this->load->view('password',$data);
        $this->load->view('include/footer',$data);
    }
    public function password_validation()
    {
        $this->load->library("form_validation");    //フォームバリデーションライブラリを読み込む。
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim|xss_clean|valid_email|callback_validate_mail");
        // $this->form_validation->set_rules("email", "メール", "required|trim|xss_clean|callback_validate_credentials");
        // validate_credentialsというファンクションを呼び出します。
        if($this->form_validation->run())
        {  //バリデーションエラーがなかった場合の処理
            $this->load->model("tbl_user_model","user");
            $userdata['tbl_user'] = $this->user->get_userdata($this->input->post("email"));
            foreach ($userdata['tbl_user'] as $row) {$userid = $row->user_id;}
            //リダイレクト
            if($this->session->flashdata('redirect_url'))
            {
                $url = $this->session->flashdata('redirect_url');
                redirect($url);
            }else{
                redirect("/");
            }
            //リダイレクト
        }else{                          //バリデーションエラーがあった場合の処理
            $data = array(
            'title' => 'パスワードリセット-エラー',
            'note' => 'ログイン',
            'message' => 'loginerr'
            );
            // $data['message'] = validation_errors();
            $this->load->view('include/header',$data);
            $this->load->view('password',$data);
            $this->load->view('include/footer',$data);
        }
    }
    public function validate_mail()
    {     //Email情報がPOSTされたときに呼び出されるコールバック機能
        $this->load->model("tbl_user_model","user");
        if($this->user->reset_pass()){   //ユーザーがログインできたあとに実行する処理
            return true;
        }else{                  //ユーザーがログインできなかったときに実行する処理
            $this->form_validation->set_message("validate_mail", "ユーザー名かパスワードが異なります。");
            return false;
        }
    }
}