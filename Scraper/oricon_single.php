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
$calendar_id = 348; //yahoo人物デイリー総数
$list_title = "オリコンCDシングルデイリーランキング";

$get_href = "http://www.oricon.co.jp/rank/js/d/";

//http://www.oricon.co.jp/rank/ja/d/2014-08-03/ 

// $get_href .= '2014-11-14'."/";
$get_href .= $datetete."/";

echo $get_href;

$rtn = array();
$img_cnt=0;
$title_cnt=0;
$artist_cnt=0;
$ccnt = 0;
//ページ取得
$html = file_get_html($get_href);


#inner img 


#inner h2 #title

#inner p name

//画像
foreach ($html->find('div .inner .image img') as $element)
{
    $rtn['img'][$img_cnt] = $element->src; 
    echo '<br><img src="'.$rtn['img'][$img_cnt] .'">';
    $img_cnt++;
}
//タイトル
foreach ($html->find('div .inner .wrap-text h2') as $element)
{
    $rtn['title'][$title_cnt] = $element->plaintext; 
    echo "<br>".$rtn['title'][$title_cnt] ;
    $title_cnt++;
}

foreach ($html->find('div .inner .wrap-text p') as $element)
{
    $rtn['artist'][$artist_cnt] = $element->plaintext; 
    echo "<br>".$rtn['artist'][$artist_cnt] ;
    $artist_cnt++;
}
//オルト
//  foreach ($html->find('div .inner wrap-text h2 p .name') as $element)
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

    $rtn = f_insert_ymd($db_conn,$calendar_id,$yyyy,$mm,$dd,$list_title,$rtn_imgs['img'][$i],$rtn_imgs['title'][$i].'-'.$rtn_imgs['artist'][$i],"",$i+1);
    $i++;
}  

// 解放する
$html->clear();
unset($rtn);

echo "end";
?>