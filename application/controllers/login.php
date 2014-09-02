<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $data = array(
            'title' => 'ログイン',
            'note' => 'ログイン'
            );
        $this->load->view('include/header',$data);
        $this->load->view('login',$data);
        $this->load->view('include/footer',$data);
    }
}



// class Login extends CI_Controller{
//     public $user = null;
//     public function __construct(){
//         parent::__construct();
//         parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
 
//         $this->load->library('facebook', array("appId"=>'1459017077694190', "secret"=>'8bf722d7b942def34e65ee76debe0f66'));
        
//         $this->user = $this->facebook->getUser();
//     }
 
//     public function index(){
 
//         if($this->user){
//             try {
//                 $user_profile = $this->facebook->api('/me');
                
//                 //ユーザーのプロフィールを表示
//                 echo "<br />";
//                 echo $user_profile['email'];
//                 echo $user_profile['first_name'];
//                 echo $user_profile['last_name'];            
 
//             }catch(FacebookApiException $e){
//                     print_r (e);
//                     $user = null;
//             }
//         }
        
//         //ユーザーがログインしているかどうか
//         if($this->user){
//             $logout=$this->facebook->getLogoutUrl(array(
//                 "next"=>base_url() .'login/logout/'
//             ));
//             echo "<a href='$logout'>Logout</a>";
//         }else{
//             $login=$this->facebook->getLoginUrl(array(
//                 "scope"=>'email'
//             ));        
//             echo "<a href='$login'>Login</a>";
//         }
//     }
    
//     function logout(){
//         session_destroy();
//         redirect(base_url().'login');
//     }
}
?>