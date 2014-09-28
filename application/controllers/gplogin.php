<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gplogin extends CI_Controller{
    public $user = null;
    public function __construct(){
        parent::__construct();
        //
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

        // $app = new Silex\Application();
        // $app['debug'] = true;
        // $app->register(new Silex\Provider\TwigServiceProvider(), array(
        //     'twig.path' => __DIR__,
        // ));
        $this = new Silex\Application();
        $this['debug'] = true;
        $this->register(new Silex\Provider\TwigServiceProvider(), array(
            'twig.path' => __DIR__,
        ));
    }
 
    private function userinfo($access_token){
        $userinfo = $this->serverGet('https://www.googleapis.com/oauth2/v1/userinfo', array('access_token' => $access_token), null, $headers);
        if (!empty($userinfo)){
            return json_decode($userinfo);
        }
    }
    public static function serverGet($url, $data, $options = null, &$responseHeaders = null){
        return self::httpRequest($url.'?'.http_build_query($data, '', '&'), $options, $responseHeaders);
    }
    /////////////////////////////////////////////////////
    // google
    /////////////////////////////////////////////////////
    function index()
    {
        $this->input->get('code', TRUE);
        if (empty($_GET['code']))
//      if (array_key_exists('code', $_GET) && !empty($_GET['code']))
        {
            // 認証ダイアログの作成
            $params = array(
           'client_id' => '804726524736-olaeauldnspoipf8jlk6vobtd6oqa2fa.apps.googleusercontent.com ', //APP_ID,
           'redirect_uri' => 'http://icalendar.xyz/gplogin/', //SITE_URL.'redirect.php',
            'state' => sha1(uniqid(mt_rand(), true)),
            'approval_prompt' => 'force',
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
            'response_type' => 'code'
            );
            $url = "https://accounts.google.com/o/oauth2/auth?".http_build_query($params);
            //Googleに飛ばす
            //$this->redirect($url);gb
             // googleへ飛ばす
              header('Location: '.$url);
                exit;
        }else{
            $code = $_GET['code'];
            $url = 'https://accounts.google.com/o/oauth2/token';
            $params = array(
                'code' => $code,
                'client_id' => '804726524736-olaeauldnspoipf8jlk6vobtd6oqa2fa.apps.googleusercontent.com', //APP_ID,
                'client_secret' => 'kAUNih__yF6SppQSih3zGJYg',
                'redirect_uri' => 'http://icalendar.xyz/gplogin/', //SITE_URL.'redirect.php',
                'grant_type' => 'authorization_code'
            );
            $response = $this->serverPost($url, $params, null, $headers);

            $results = json_decode($response);
//var_dump($me);
        }
        //プロフィール取得
        if (!empty($results) && !empty($results->access_token))
        {
            //DB接続
            //ユーザ確認　($results->id)
            //ユーザインサート
            $userinfo = $this->userinfo($results->access_token);
            $this->auth = array(
            'apilfg' => 'GG',
            'uid' => $userinfo->id,
            'info' => array(
                'name' => $userinfo->name,
                'email' => $userinfo->email,
                'first_name' => $userinfo->given_name,
                'last_name' => $userinfo->family_name,
                'image' => $userinfo->picture
                ),
            'credentials' => array(
                'token' => $results->access_token,
                'expires' => date('c', time() + $results->expires_in)
                ),
            'raw' => $userinfo
            );
            $signindata = array(
                'uid' =>  $userinfo->id,
                'email' => $userinfo->email,
                'image' => $userinfo->picture,
                'token' => $results->access_token
                    );
            //サインイン処理
            if (!empty($signindata))
            {
                $this->session->set_userdata($signindata);
            }
        }
//$email = $this->session->all_userdata();
//$email = $this->session->userdata('email');
//var_dump($email);
//exit;
        //リダイレクト
        redirect('welcome');
    }
    //ログアウト
    function logout(){
        // Revoke current user's token and reset their session.
        $this->post('/disconnect', function () use ($this, $client) {
        $token = json_decode($this['session']->get('token'))->access_token;
        $client->revokeToken($token);
        // Remove the credentials from the user's session.
        $this['session']->set('token', '');
        return new Response('Successfully disconnected', 200);
        });
        //
        session_destroy();
        redirect(base_url().'login');
    }
}
?>