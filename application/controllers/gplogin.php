<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gplogin extends CI_Controller{
    public $user = null;
    public function __construct()
    {

        $this->output->enable_profiler(TRUE);
        parent::__construct();
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);

        set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ .'/vendor/google/apiclient/src');
        require_once __DIR__.'/vendor/autoload.php';
        use Symfony\Component\HttpFoundation\Request;
        use Symfony\Component\HttpFoundation\Response;

        const CLIENT_ID = '804726524736-lsgolk31rp1452mhn3lhqshir9j73tsp.apps.googleusercontent.com';
        const CLIENT_SECRET = 'x9H8CxsbeCtKLzKeLmrUzwmw';
        const APPLICATION_NAME = "iCalendar";

        $client = new Google_Client();
        $client->setApplicationName(APPLICATION_NAME);
        $client->setClientId(CLIENT_ID);
        $client->setClientSecret(CLIENT_SECRET);
        $client->setRedirectUri('postmessage');
        $plus = new Google_Service_Plus($client);
        $app = new Silex\Application();
        $app['debug'] = true;
        $app->register(new Silex\Provider\TwigServiceProvider(), array(
            'twig.path' => __DIR__,
        ));
        
    }

    public function index()
    {
        $data = array();

        $app->register(new Silex\Provider\SessionServiceProvider());
        // Initialize a session for the current user, and render index.html.
        $app->get('/', function () use ($app) {
        $state = md5(rand());
        $app['session']->set('state', $state);
var_dump($app['twig']);
        // return $this['twig']->render('index.html', array(
        //     'CLIENT_ID' => CLIENT_ID,
        //     'STATE' => $state,
        //     'APPLICATION_NAME' => APPLICATION_NAME
        //     ));
        });
 
        // if($this->user){
        //     try {
        //         $user_profile = $this->facebook->api('/me');      

        //         // print_r($user_profile);

        //         $username = $user_profile['name'];
        //         $email = $user_profile['email'];
        //         $fb_id = $user_profile['id'];
        //         $gender = $user_profile['gender'];
        //         $picture = 'https://graph.facebook.com/'.$fb_id.'/picture?type=square';
        //         $first_name = $user_profile['first_name'];
        //         $last_name = $user_profile['last_name'];
        //         $link = $user_profile['link'];
        //         $locale = $user_profile['locale'];
        //         //
        //         $this->load->model('tbl_user_model', 'fbuser'); //アイテム
        //         $userdata['tbl_user'] = $this->fbuser->get_userdata($email);
        //         foreach ($userdata['tbl_user'] as $row) {$profile_img = $row->user_profile;$rtn_id = $row->user_id;}
        //         if($rtn_id){
        //             //登録済みUSERID
        //             $userid = $rtn_id;
        //         }else{
        //             //インサート
        //             $rtn_id = $this->fbuser->fb_log_in($username,$email,$fb_id,$gender,$picture,$first_name,$last_name,$link,$locale);
        //         }
        //         //
        //         //ユーザーのプロフィールを表示
        //         $data["email"] = $user_profile['email'];
        //         $data["is_logged_in"] = 1;
        //         $data["status"] = "LOGIN";
        //         $data["userid"] = $userid;
        //         $data["profile_img"] = $picture;
        //         $data["remember"] = $remember;
        //         $this->session->set_userdata($data);
        
        //     }catch(FacebookApiException $e){
        //             print_r (e);
        //             $user = null;
        //     }
        // }
        
        // //ユーザーがログインしているかどうか
        // if($this->user)
        // {   
        //     //リダイレクト
        //     if($this->session->flashdata('redirect_url'))
        //     {
        //         $url = $this->session->flashdata('redirect_url');
        //         redirect($url);
        //     }else{
        //         redirect("/",'refresh');
        //     }

        //     // $logout=$this->facebook->getLogoutUrl(array(
        //     //     "next"=>base_url() .'login/logout/'
        //     // ));
        //     // echo "<a href='$logout'>Logout</a>";
        // }else{
        //     $login=$this->facebook->getLoginUrl(array(
        //         "scope"=>'email'
        //     ));        
        //     // echo "<a href='$login'>Login</a>";
        //     redirect($login);
        // }
    }
    
    function logout(){
        session_destroy();
        redirect(base_url().'login');
    }
}
?>