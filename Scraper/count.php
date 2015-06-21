<?php
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


// カレンダー数
function f_count_calendar($db_conn)
{
    $sql = "SELECT COUNT(*) FROM `tbl_calendar` WHERE `onflg` = 'ON'";
    $result = mysql_query($sql,$db_conn);
    if($result)
    {
        while($link = mysql_fetch_row($result))
        {
            list($count_cnt) = $link;
            // $exm_url = urlencode($tags);
            $rtn_st = $count_cnt;
        }
    }
    return $rtn_st;
}
// アイテム数
function f_count_item($db_conn)
{
    $sql = "SELECT COUNT(*) FROM `tbl_ymd` ";
    $result = mysql_query($sql,$db_conn);
    if($result)
    {
        while($link = mysql_fetch_row($result))
        {
            list($ymd_cnt) = $link;
            // $exm_url = urlencode($tags);
            $rtn_st = $ymd_cnt;
        }
    }
    return $rtn_st;
}
// アイテム数
function f_count_days($db_conn)
{
    $sql = "SELECT COUNT(*) FROM `tbl_ymd` WHERE `order` = 1";
    $result = mysql_query($sql,$db_conn);
    if($result)
    {
        while($link = mysql_fetch_row($result))
        {
            list($days_cnt) = $link;
            // $exm_url = urlencode($tags);
            $rtn_st = $days_cnt;
        }
    }
    return $rtn_st;
}

$cal_cnt = f_count_calendar($db_conn);
$item_cnt = f_count_item($db_conn);
$days_cnt = f_count_days($db_conn);

$sql = "UPDATE `tbl_count` SET `category_cnt`='$cal_cnt',`day_cnt`='$days_cnt',`item_cnt`='$item_cnt'";

// echo "<br>cal_cnt=".$cal_cnt;
// echo "<br>item_cnt=".$item_cnt;
// echo "<br>days_cnt=".$days_cnt;
// echo "<br>sql=".$sql;

$result = mysql_query($sql, $db_conn);
if($result)
{
    echo "OK";
}else{
    echo "NG";
}
?>
