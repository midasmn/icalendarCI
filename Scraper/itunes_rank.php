<?php

require 'simple_html_dom.php';

// header('Content-Type: text/html; charset=utf-8');

$host = "localhost";   // 接続するMySQLサーバー
$user = "root";      // MySQLのユーザー名
$pass = "mn9621mnZ+";      // MySQLのパスワード
$dbname= "icalendar";      // DBの名前

// データベースに接続
if(!$db_conn = mysql_connect($host, $user, $pass)){
print("データベースにアクセスできません。");
exit;
}
$rtn = mysql_query("SET NAMES utf8" , $db_conn);
mysql_select_db($dbname);

//インサート
function f_insert_ymd($db_conn,$calendar_id,$yyyy,$mm,$dd,$list_title,$img_path,$img_alt,$href,$order)
{
   mb_language('Japanese');//←これ
   // $img_alt=mb_convert_encoding($img_alt,'UTF-8','auto');

   // echo "<br>calendar_id:".$calendar_id;
   // echo "<br>yyyy:".$yyyy;
   // echo "<br>mm:".$mm;
   // echo "<br>dd:".$dd;
   // echo "<br>list_title:".$list_title;
   // echo "<br>img_path:".$img_path;
   // echo "<br>img_alt:".$img_alt;
   // echo "<br>href:".$href;
   // echo "<br>order:".$order;




    $sql = "INSERT INTO `tbl_ymd`(`id`, `calendar_id`, `yyyy`, `mm`, `dd`, `name`,`img_path`, `img_alt`, `href`, `order`, `createdate`) VALUES (NULL, '$calendar_id', '$yyyy', '$mm', '$dd', '$list_title','$img_path', '$img_alt', '$href', '$order', CURRENT_TIMESTAMP)";
    $result = mysql_query($sql, $db_conn);
    if(!$result)
    {
        $rtn =  "NG";
        echo $result;
    }else{
        $rtn = "OK";
    }
    return $rtn;
}
/////////////
$yyyy = date('Y');
$mm = date('m');
$dd = date('d');
$dd = sprintf("%02d", $dd);
// $dd = "03";
//////////////////
/////////////////

$calendar_id = $_GET['calendar_id'];
// $calendar_id = 352;
//
switch ($calendar_id) {
    case 352:
        $list_title = "iTunesソング";
        $get_href = "http://www.apple.com/jp/itunes/charts/songs/";
        break;
    case 353:
        $list_title = "iTunesアルバム";
        $get_href = "http://www.apple.com/jp/itunes/charts/albums/";
        break;
    case 354:
        $list_title = "iTunes映画";
        $get_href = "http://www.apple.com/jp/itunes/charts/movies/";
        break;
    case 355:
        $list_title = "iTunesブック";
        $get_href = "http://www.apple.com/jp/itunes/charts/paid-books/";
        break;
    case 356:
        $list_title = "iTunes無料App";
        $get_href = "http://www.apple.com/jp/itunes/charts/free-apps/";
        break;
    case 357:
        $list_title = "iTunes有料App";
        $get_href = "http://www.apple.com/jp/itunes/charts/paid-apps/";
        break;
    case 358:
        $list_title = "iTunesミュージックビデオ";
        $get_href = "http://www.apple.com/jp/itunes/charts/music-videos/";
        break;
    default:
        # code...
        break;
}


//http://www.oricon.co.jp/rank/ja/d/2014-08-03/ 
// $get_href .= $yyyy."-".$mm."-".$dd."/";
// $get_url = "https://
 // echo $list_title;

$rtn = array();
$rnk_cnt = 0;
$url_cnt = 0;
$img_cnt = 0;
$title_cnt = 0;


$ccnt = 0;
//ページ取得
$html = file_get_html($get_href);

//画像

// <li><strong>
//ランク
foreach ($html->find('li strong') as $element)
{
    $rtn['rnk'][$rnk_cnt] = $element->plaintext; 
    // echo "<br>".$rnk_cnt."rnk".$rtn['rnk'][$rnk_cnt];
    $rnk_cnt++;
}
//画像
 foreach ($html->find('img') as $element)
{
    $rtn['alt'][$img_cnt] = $element->alt; 
    $rtn['img_url'][$img_cnt] = $element->src; 
    // echo "<br>".$img_cnt."alt".$rtn['alt'][$img_cnt];
    // echo "<br>".$img_cnt."img_url".$rtn['img_url'][$img_cnt];
    $img_cnt++;
}
//タイトル
 foreach ($html->find('h3 a') as $element)
{
    $rtn['url'][$title_cnt] = $element->href;
    $rtn['title'][$title_cnt] = $element->plaintext; 
    // echo "<br>".$title_cnt."title".$rtn['title'][$title_cnt];
    // echo "<br>".$title_cnt."url".$rtn['url'][$title_cnt];
    $title_cnt++;
}
$rtn_imgs = $rtn;
//z
$cnt = count($rtn_imgs['title']);
$i = 0;
while ($i<$cnt) 
{
    //insert


// $img_alt  = $rtn_imgs['title'][$i];
// $img_path = $rtn_imgs['img_url'][$i];
// $href = $rtn_imgs['url'][$i];
// $order = $rtn_imgs['rnk'][$i];

// $alt2 = $rtn_imgs['alt'][$i];


// echo "<br>calendarid:".$calendar_id;
// echo "<br>yyyy:".$yyyy;
// echo "<br>mm:".$mm;
// echo "<br>dd:".$dd;
// echo "<br>list_title:".$list_title;
// echo "<br>img_path:".$img_path;
// echo "<br>img_alt:".$img_alt;
// echo "<br>img_alt2:".$alt2;
// echo "<br>href:".$href;
// echo "<br>calendarid:".$order;

    $rtnB = f_insert_ymd($db_conn,$calendar_id,$yyyy,$mm,$dd,$list_title,$rtn_imgs['img_url'][$i],$rtn_imgs['title'][$i],$rtn_imgs['url'][$i],$rtn_imgs['rnk'][$i]);
    // $rtn = f_insert_ymd($db_conn,$calendar_id,$yyyy,$mm,$dd,$list_title,$rtn_imgs['img'][$i],$rtn_imgs['title'][$i].'-'.$rtn_imgs['artist'][$i],"",$i+1);
    $i++;
// echo "<br>".$i;
}  

// 解放する
$html->clear();
unset($rtn);

echo "end";
?>