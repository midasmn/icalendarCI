<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fblogin extends CI_Controller{
    public $user = null;
    public function __construct(){
        parent::__construct();
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        $this->load->library('facebook', array("appId"=>'1459017077694190', "secret"=>'8bf722d7b942def34e65ee76debe0f66'));
        $this->user = $this->facebook->getUser();
    }
 
    public function index()
    {
    	$data = array();
 
        if($this->user){
            try {
                $user_profile = $this->facebook->api('/me');      
                //ユーザーのプロフィールを表示
                // echo "<br />";
                // echo $user_profile['email'];
                // echo $user_profile['first_name'];
                // echo $user_profile['last_name'];   
                $data["email"] = $user_profile['email'];
                // $data["first_name"] => $user_profile['first_name'];
                // $data["last_name"] => $user_profile['last_name'];  
                $data["is_logged_in"] = 1;
                $data["status"] = "LOGIN";
                // $data["userid"] => $user_profile['userid'];
                // $data["profile_img"] => $user_profile['profile_img'];
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
            $logout=$this->facebook->getLogoutUrl(array(
                "next"=>base_url() .'login/logout/'
            ));
            echo "<a href='$logout'>Logout</a>";
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