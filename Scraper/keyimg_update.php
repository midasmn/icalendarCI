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


//リセット
$sql = "UPDATE `tbl_ymd` SET `keyimg` = 'OFF' WHERE keyimg = 'KEY'";
$result = mysql_query($sql, $db_conn);


function f_keyimg_update($db_conn,$id)
{
    $sql = "UPDATE `tbl_ymd` SET `keyimg` = 'KEY' WHERE id = '$id'" ;
    $result = mysql_query($sql, $db_conn);
    return $id;
}

/////////////////
// デイリーアイテム
$strSQL = "SELECT  max(`id`)  FROM `tbl_ymd` WHERE `order` = 1 and `yyyy` <> 9999 group by `calendar_id`";
$tbl_tmp = mysql_query($strSQL, $db_conn);
if($tbl_tmp)
{
    while($link = mysql_fetch_row($tbl_tmp))
    {
        list($id) = $link;

        $rtn = f_keyimg_update($db_conn,$id);
        // echo "<br>".$rtn ;
    }
}

/////////////////
// 年関係なしアイテム
$mm = date('m');
$dd = date('d');
$strSQL = "SELECT max(`id`) FROM `tbl_ymd` WHERE `yyyy` = 9999 and `mm` = '$mm' and `dd` = '$dd' and `order` = 1 group by `calendar_id` ";
$tbl_tmp = mysql_query($strSQL, $db_conn);
if($tbl_tmp)
{
    while($link = mysql_fetch_row($tbl_tmp))
    {
        list($id) = $link;
        $rtn = f_keyimg_update($db_conn,$id);
        // echo "<br>".$rtn ;
    }
}

/////////////

?>
