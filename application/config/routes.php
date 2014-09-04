<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//bookmark

$route['test'] = "jquery/index";

$route['logout'] = "login/logout";
//カレンダー
// $route['calendar/?bookmark/:num'] = "calendar/index";
$route['calendar/:num'] = "calendar/index";
$route['calendar/:num/:num/:num'] = "calendar/index";


$route['daylist/:num/:num/:num/:num'] = "daylist/index";

// カレンダー一覧
$route['smart/:num'] = "calist/index/smart";
$route['newer/:num'] = "calist/index/newer";
$route['random/:num'] = "calist/index/random";

$route['smart'] = "calist/index/smart";
$route['newer'] = "calist/index/newer";
$route['random'] = "calist/index/random";

// 静的ページ
$route['about'] = "staticpages/about";
$route['terms'] = "staticpages/terms";
$route['privacy'] = "staticpages/privacy";
$route['faq'] = "staticpages/faq";
$route['supportform'] = "staticpages/supportform";



$route['default_controller'] = "welcome";
// $route['404_override'] = '';
$route['404_override'] = 'error/error_404';


/* End of file routes.php */
/* Location: ./application/config/routes.php */