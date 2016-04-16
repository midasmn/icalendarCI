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
   $img_alt=mb_convert_encoding($img_alt,'UTF-8','auto');

    $sql = "INSERT INTO `tbl_ymd`(`id`, `calendar_id`, `yyyy`, `mm`, `dd`, `name`,`img_path`, `img_alt`, `href`, `order`, `createdate`) VALUES (NULL, '$calendar_id', '$yyyy', '$mm', '$dd', '$list_title','$img_path', '$img_alt', '$href', '$order', CURRENT_TIMESTAMP)";
    $result = mysql_query($sql, $db_conn);
    if(!$result)
    {
        $rtn =  "NG";
    }else{
        $rtn = "OK";
    }
    return $rtn;
}
/////////////
$yyyy = date('Y');
$mm = date('m');
$dd = date('d');
// $dd = sprintf("%02d", $dd -1);
// $dd = "03";
//////////////////
//日付チェック
if($yyyy&&$mm){
    $timeStamp = strtotime($yyyy .'-'.$mm. "-".$dd);
    if($timeStamp === false)
    {
        $yyyy = date("Y");
        $mm = date("n");
        $dd = date("n");
    }
}else{
    $yyyy = date("Y");
    $mm = date("n");
    $dd = date("d");
}

// $yyyy = '2014';
// $mm = '11';
// $dd = '07';


$datetete = date("Y-m-d",mktime(0,0,0,$mm,$dd-1,$yyyy)); 
/////////////////
$calendar_id = 6882; //レコチョクシングル
$list_title = "レコチョクシングルデイリーランキング";

$get_href = "http://recochoku.jp/ranking/single/daily/";
// $get_href = "http://recochoku.jp/ranking/album/daily/";
// $get_href .= $datetete."/";
$rtn = array();
$img_cnt=0;
$title_cnt=0;
$artist_cnt=0;
$ccnt = 0;
//ページ取得

echo $get_href;
$html = file_get_html($get_href);


//画像

// $es = $html->find(‘table td[align=center]’);

foreach ($html->find('.info a img') as $element)
{
    $rtn['img'][$img_cnt] = $element->style; 
    if(strlen($rtn['img'][$img_cnt])<1){}else
    {
        $rtn['img'][$img_cnt] = str_replace('background:url(//', 'http://', $rtn['img'][$img_cnt]);
        $rtn['img'][$img_cnt] = str_replace(') no-repeat 50% 50%;', '', $rtn['img'][$img_cnt]);
        // 
        $rtn_alt = $element->alt; 
        $rtn_alts = explode("&nbsp;", $rtn_alt);
        $rtn['title'][$img_cnt]=$rtn_alts[0];
        $rtn['artist'][$img_cnt]=$rtn_alts[1];
        $img_cnt++;  
    }
    
}
// //タイトル
// foreach ($html->find('.info .ttl') as $element)
// {
//     $rtn['title'][$title_cnt] = $element->plaintext; 
//     echo "<br>".$rtn['title'][$title_cnt] ;
//     $title_cnt++;
// }
// foreach ($html->find('.info .ttl p a') as $element)
// {
//     $rtn['artist'][$artist_cnt] = $element->plaintext; 
//     echo "<br>".$rtn['artist'][$artist_cnt] ;
//     $artist_cnt++;
// }


$rtn_imgs = $rtn;
//
$cnt = count($rtn_imgs['title']);
$i = 0;
while ($i<$cnt) 
{
    //insert

// echo "<br>".$calendar_id;
// echo "<br>".$yyyy."-".$mm."-".$dd;
// echo "<br>".$list_title;
// echo "<br>".$rtn_imgs['img'][$i];
// echo "<br>".$rtn_imgs['title'][$i].'-'.$rtn_imgs['artist'][$i];
// echo "<br>".$i+1;

    $rtn = f_insert_ymd($db_conn,$calendar_id,$yyyy,$mm,$dd,$list_title,$rtn_imgs['img'][$i],$rtn_imgs['title'][$i].'-'.$rtn_imgs['artist'][$i],"",$i+1);
    $i++;
}  

// 解放する
$html->clear();
unset($rtn);

echo "end";
?>