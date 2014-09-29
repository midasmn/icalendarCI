<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fblogin extends CI_Controller{
    public $user = null;
    public function __construct(){
        parent::__construct();
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        $this->load->library('facebook', array("appId"=>'1459017077694190', "secret"=>'8bf722d7b942def34e65ee76debe0f66'));
        $this->user = $this->facebook->getUser();
        $this->output->enable_profiler(TRUE);
    }
 
    public function index()
    {
    	$data = array();
 
        if($this->user){
            try {
                $user_profile = $this->facebook->api('/me');      

                // print_r($user_profile)
                $username = $user_profile['name'];
                $email = $user_profile['email'];
                $fb_id = $user_profile['id'];
               	$gender = $user_profile['gender'];
                $picture = 'https://graph.facebook.com/'.$fb_id.'/picture?type=square';
                $first_name = $user_profile['first_name'];
                $last_name = $user_profile['last_name'];
                $link = $user_profile['link'];
               	$locale = $user_profile['locale'];
               	//
               	$this->load->model('tbl_user_model', 'fbuser'); //アイテム
               	$userdata['tbl_user'] = $this->fbuser->get_userdata($email);
            	foreach ($userdata['tbl_user'] as $row) {$profile_img = $row->user_profile;$rtn_id = $row->user_id;}
            	if($rtn_id){
            		//登録済みUSERID
            		$userid = $rtn_id;
            	}else{
            		//インサート
            		$rtn_id = $this->fbuser->fb_log_in($username,$email,$fb_id,$gender,$picture,$first_name,$last_name,$link,$locale);
            	}
                //
                //ユーザーのプロフィールを表示
                $data["email"] = $user_profile['email'];
                $data["is_logged_in"] = 1;
                $data["status"] = "LOGIN";
                $data["userid"] = $userid;
                $data["profile_img"] = $picture;
                $data["remember"] = $remember;
                $this->session->set_userdata($data);
        
            }catch(FacebookApiException $e){
                    print_r (e);
                    $user = null;
            }
        }
        
        //ユーザーがログインしているかどうか
        if($this->user)
        {	
        	//リダイレクト
       	 	if($this->session->flashdata('redirect_url'))
        	{
            	$url = $this->session->flashdata('redirect_url');
            	redirect($url);
        	}else{
            	redirect("/",'refresh');
        	}

            // $logout=$this->facebook->getLogoutUrl(array(
            //     "next"=>base_url() .'login/logout/'
            // ));
            // echo "<a href='$logout'>Logout</a>";
        }else{
            $login=$this->facebook->getLoginUrl(array(
                "scope"=>'email'
            ));        
            // echo "<a href='$login'>Login</a>";
            redirect($login);
        }
    }
    
    function logout(){
        session_destroy();
        redirect(base_url().'login');
    }
}
?>