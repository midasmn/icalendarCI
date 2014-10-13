<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gplogin extends CI_Controller{
    public $user = null;
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);

        $this->load->library('session');
        $this->config->load('googleplus');

// $config['googleplus']['application_name'] = 'iCalendar';
// $config['googleplus']['client_id'] = '804726524736-lsgolk31rp1452mhn3lhqshir9j73tsp.apps.googleusercontent.com';
// $config['googleplus']['client_secret'] = 'x9H8CxsbeCtKLzKeLmrUzwmw';
// $config['googleplus']['redirect_uri'] = 'http://icalendar.xyz';
// $config['googleplus']['api_key'] = 'AIzaSyCdJ72swoz9LlveSR3-h7Lhshruk7Efyww';
// $config['googleplus']['site_url']  = 'http://icalendar.xyz/gplogin/';
        //
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
        
        $data = array();
        if(empty($_GET['code']))
        {
            //認証前処理
            //認証ダイアログの作成
            //CSRF対策
            $this->session->set_userdata('state', sha1(uniqid(mt_rand(),true)));
            $params = array(
                'client_id' => $this->config->item('client_id', 'googleplus'),
                'redirect_uri' => $this->config->item('redirect_uri', 'googleplus'),
                'state' => $this->session->userdata('state'),
                // 'approval_prompt' => 'force',   //都度ダイアログ
                'approval_prompt' => 'auto',
                // 'scope' => 'https://www.googleapis.com/auth/plus.login',
                'scope' => 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email',
                'response_type' => 'code'
                );
            //googleへ飛ばす
            $url = 'https://accounts.google.com/o/oauth2/auth?'.http_build_query($params);  
            header('Location: '.$url);
            exit;
        }else{
            //認証後の処理
            if($this->session->userdata("state")!= $_GET['state']){
                echo 'ふせいなしょりでした';
                exit;
            }
            //access_tokenを取得
            $params = array(
                'client_id' => $this->config->item('client_id', 'googleplus'),
                'client_secret' => $this->config->item('client_secret', 'googleplus'),
                'code' => $_GET['code'],
                'redirect_uri' => $this->config->item('redirect_uri', 'googleplus'),
                'grant_type' => 'authorization_code'
            );
            $url = 'https://accounts.google.com/o/oauth2/token';      
            $curl = curl_init();    //cURLを初期化して使用可能にする
            curl_setopt($curl,CURLOPT_URL,$url);    //オプションにURLを設定する
            curl_setopt($curl,CURLOPT_POST,true);   //メソッドをPOSTに設定
            curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($params));    //POSTデータ設定
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            $rs = curl_exec($curl);
            curl_close($curl);
            $json = json_decode($rs);
            //ユーザ情報
            $url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token='.$json->access_token;
            $me = json_decode(file_get_contents($url));
            $email = $me->email;
            //DB格納
            //ユーザがDBにいるか調べる
            $this->load->model('tbl_user_model', 'gpuser'); //アイテム
            $userdata['tbl_user'] = $this->gpuser->get_userdata($email);
            foreach ($userdata['tbl_user'] as $row) {$profile_img = $row->user_profile;$rtn_id = $row->user_id;}
            if($rtn_id){
                //登録済みUSERID
                $userid = $rtn_id;
            }else{
                //インサート]
                // $email = $me->email;
                $fb_id = $me->id;
                $username = $me->name;
                $profile_img = $me->picture;
                $gptoken = $json->access_token;
                //
                $userid = $this->gpuser->gp_log_in($username,$email,$fb_id,$gender,$profile_img,$first_name,$last_name,$link,$locale,$gptoken);
            }
// echo "gpusrid:".$userid;
            //ユーザーのプロフィールを表示
            $data["email"] = $email;
            $data["is_logged_in"] = 1;
            $data["status"] = "LOGIN";
            $data["userid"] = $userid;
            $data["profile_img"] = $profile_img;
            $data["remember"] = $remember;
            $this->session->set_userdata($data);

            //ユーザーがログインしているかどうか
            if($userid)
            {   
                //リダイレクト
                if($this->session->flashdata('redirect_url'))
                {
                    $url = $this->session->flashdata('redirect_url');
                    redirect($url);
                }else{
                    redirect("/",'refresh');
                }
            }else{
                 //index.phpへ
                header('Location: '.$this->config->item('site_url', 'googleplus'));
            }
        }
    
    }
}
?>