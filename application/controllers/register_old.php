<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        // $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        $data = array(
            'title' => 'ID(無料)を登録する',
            'note' => 'ID(無料)を登録する'
            );
        $this->load->view('include/header',$data);
        $this->load->view('register',$data);
        // $this->load->view('login',$data);
        $this->load->view('include/footer',$data);
    }
    public function register_validation()
    {
        $data = array();
        $this->load->library("form_validation");    //フォームバリデーションのライブラリを読み込む
        $this->form_validation->set_rules("email", "メールアドレス", "required|trim|valid_email|is_unique[tbl_user.email]");
        $this->form_validation->set_rules("password", "パスワード", "required|trim");
        $this->form_validation->set_rules("password_confirmation", "パスワードの確認", "required|trim|maches[password]");

        //エラーメッセージ
        $this->form_validation->set_message("is_unique", "入力したメールアドレスはすでに登録されています");

        if($this->form_validation->run())
        {
            // echo "Success!!";
            //ランダムキー作成
            $key=md5(uniqid());
            //確認メール送信
            //Emailライブラリを読み込む。メールタイプをHTMLに設定（デフォルトはテキストです）
            $this->load->library("email", array("mailtype"=>"html"));
            $this->load->model("tbl_user_model","user");
            //送信元の情報
            $this->email->from("info@icalendar.xyz<iCalendar[iカレンダー]>", "[iCalendar]");
            //送信先の設定
            $this->email->to($this->input->post("email"));
            //タイトルの設定
            $this->email->subject("[iCalendar]仮登録のお知らせ");
            //メッセージの本文
            $message = "<p>会員登録ありがとうございます。</p>";
            $message =  "<p>".$this->input->post("email")." 様</p>";
            $message .=  "<p>ようこそ、【iCalendar】へ。</p>";
            $message .=  "<p>このたびは【iCalendar】に会員登録をいただき、ありがとうございます。</p>";
            $message .=  "<p>下記のURLから会員登録を完了させてください</p>";
            // 各ユーザーにランダムキーをパーマリンクに含むURLを送信する
            $message .= '<p><a href="'.base_url(). 'register/register_user/'.$key.'">'.base_url().'register/register_user/'.$key.'</a></p>';
            $message .= '<p>メール登録後、30分を超過しますと、セキュリティ保持のため有効期限切れとなります。</p>';
            $message .= '<p>その場合はお手数ですが、再度最初からご登録をお願い致します。</p>';
            $message .= '<p>▼ご登録情報▼</p>';
            $message .= '<p>メールアドレス：'.$this->input->post("email").'</p>';
            $message .= '<p>■iCalendarのトップページへ</p>';
            $message .= '<p><a href="http://icalendar.xyz">http://icalendar.xyz</a></p>';
            $message .= '<p>——————————————————————————————————</p>';
            $message .= '<p>このメールに返信されても、iCalendarに関するお問い合わせにはお答えできません。</p>';
            $message .= '<p>お問い合わせはこちら: <a href="http://icalendar.xyz/supportform">http://icalendar.xyz/supportform/</a></p>';
            $message .= '<p>——————————————————————————————————';
            $message .= "<p>© ".date('Y')." atomb.it.</p>";
            $this->email->message($message);


            //ユーザーに確認メールを送信できた場合、ユーザーを temp_users DBに追加する
            if($this->user->add_temp_user($key))
            {
                if($this->email->send())
                {
                    // echo "仮登録メール成功時";
                    $data['title'] = "仮登録メール送信";
                    $data['h1'] = "仮登録メール送信";
                    $data['message_st'] = "仮登録メール配信しました。";
                    $this->load->view('include/header',$data);
                    $this->load->view('message',$data);
                    $this->load->view('include/footer',$data);
                    //メール送信後のページ
                }else echo "メール送信失敗時";
            }else echo "DB登録失敗";
        }else{
            $data['title'] = "登録-エラー";
            $data['note'] = "登録-エラー";
            $data['message'] = "registerr";
            $data['validation_err'] = validation_errors();
            $this->load->view('include/header',$data);
            $this->load->view('register',$data);
            $this->load->view('include/footer',$data);
        }
    }


    //登録処理
    public function register_user($key)
    {
        $data = array();
        //add_temp_usersモデルが書かれている、model_uses.phpをロードする
        $this->load->model("tbl_user_model","user");
        if($this->user->is_valid_key($key))
        {    //キーが正しい場合は、以下を実行
            //add_usersがTrueを返したら以下を実行
            if($newemail = $this->user->add_user($key))
            {    
                //ログイン成功
                redirect("/",'refresh');
            }else{
                // echo "fail to add user. please try again";
                $data['title'] = '登録エラー';
                $data['message'] = 'registerr';
                $data['validation_err'] = validation_errors();
                $this->load->view('include/header',$data);
                $this->load->view('register',$data);
                $this->load->view('include/footer',$data);
            }
        }else{
            //echo "invalid key";
            $data['title'] = "登録URLエラー";
            $data['h1'] = "登録URLエラー";
            $data['message_st'] = "URLは無効です。<br>有効期限が切れています。";
            $this->load->view('include/header',$data);
            $this->load->view('message',$data);
            $this->load->view('include/footer',$data);
        } 
    }

}