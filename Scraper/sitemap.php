<?php

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

// $domain	= "http://icalendar.xyz/";;

echo "sitemapstart";

////////////////////////////////////////
//静的ファイルサイトマップ
// out 除外PHPファイル名
// stat_name xmlファイル名
////////////////////////////////////////
function f_stat_sitemap()
{
	$base_dir = "/usr/share/nginx/html/icalendar.xyz/";
	$baseurl = 'http://icalendar.xyz/';
	$filename = $base_dir.'statsitemap.xml';
	$arr_stat_php  = array("smart","newer","random","sitemap","about","terms","faq","privacy","supportform");//静的PHP
	if (FALSE == ($fp = fopen($filename, "w"))){
		print "サイトマップを作成に失敗。ディレクトリのパーミッションを見直してください";
		exit();
	}
	//
	$time = date("c");
  	$temp ='<?xml version="1.0" encoding="UTF-8"?>'."\n";
  	$temp .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
  	//
  	foreach ($arr_stat_php as $key => $value)
  	{
  		$temp .= '<url>'."\n";
	    $temp .= '<loc>'.$baseurl.$value.'</loc>'."\n";
	    $temp .= '<lastmod>'.$time.'</lastmod>'."\n";
	    $temp .= '<changefreq>weekly</changefreq>'."\n";
	    $temp .= '<priority>0.5</priority>'."\n";
	  	$temp .= '</url>'."\n";
	  	
	}
	$temp .= '</urlset>'."\n";
	fputs($fp,$temp);
	fclose($fp);
	return "END";
}
////////////////////////////////////////
function f_day_sitemap($db_conn)
{
	//googleサイトマップ制限 URL50000,50MB 500ファイル
	$base_dir = "/usr/share/nginx/html/icalendar.xyz/";
	$dailysitemapname = "dailysitemap";
	$baseurl = 'http://icalendar.xyz/daylist/';
	$max_url = 50000;	//1ファイルURL制限
	$max_filecnt = 500;	//xmlファイル数制限
	$urlcnt = 1;	//url数初期値
	$filecnt = 1;	//xmlファイル数初期値
	//
	$result = mysql_query("SELECT `tbl_ymd`.`calendar_id`, `tbl_ymd`.`yyyy`, `tbl_ymd`.`mm`, `tbl_ymd`.`dd` FROM `tbl_ymd`,`tbl_calendar` WHERE `tbl_calendar`.`id` = `tbl_ymd`.`calendar_id` and `tbl_calendar`.`onflg` = "ON" and  `tbl_ymd`.`order` = 1 order by id desc", $db_conn);
	$rows = mysql_num_rows($result);

	while($link = mysql_fetch_row($result))
	{
		list($calendarid,$yyyy,$mm,$dd) = $link;	
		if($urlcnt<=$max_url)	//5000URL制限
		{
			if($urlcnt==1)
			{
				////xmlファイル500制限まで
				if($filecnt<$max_filecnt)
				{
					//ファイル作成
					$filename = $base_dir.$dailysitemapname.$filecnt.'.xml';
					if (FALSE == ($fp = fopen($filename, "w")))
					{
						print "サイトマップを作成に失敗。ディレクトリのパーミッションを見直してください";
						exit();
					}else{
						$filecnt++;	//xmlファイル数
					}
				}else{
					//終了
					exit();
				}
  				$temp ='<?xml version="1.0" encoding="UTF-8"?>'."\n";
  				$temp .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
			}
			$time = date("c");
			$url = $baseurl.'/'.$calendarid.'/'.$yyyy.'/'.$mm.'/'.$mm;
	  		$temp .= '<url>'."\n";
		    $temp .= '<loc>'.$url.'</loc>'."\n";
		    $temp .= '<lastmod>'.$time.'</lastmod>'."\n";
		    $temp .= '<changefreq>weekly</changefreq>'."\n";
		    $temp .= '<priority>0.5</priority>'."\n";
		  	$temp .= '</url>'."\n";
		  	$urlcnt++;
		}
		if($urlcnt==$max_url)
		{
			$temp .= '</urlset>'."\n";
			fputs($fp,$temp);
			fclose($fp);
			$urlcnt = 1;
			$filecnt++;
			$temp ="";
			// $filename = $base_dir.$db_sitemap_name.$sitemapno.'.xml';
			// if (FALSE == ($fp = fopen($filename, "w"))){
			// 	print "サイトマップを作成に失敗。ディレクトリのパーミッションを見直してください";
			// 	exit();
			// }
		}	
	}
	$temp .= '</urlset>'."\n";
	fputs($fp,$temp);
	fclose($fp);
	return $filecnt;
}
//////////////////
// サイトマップインデックス

function f_sitemap_write($domain,$rtn_cnt)
{
	$statxml = 'html://icalendar.xyz/statsitemap.xml';	//静的ページXML
	$calxml =	'html://icalendar.xyz/calsitemap.xml';	//カレンダーページXML
	$dayxml = 'html://icalendar.xyz/dailysitemap';	//日付base	
	//
	$base_dir = "/usr/share/nginx/html/icalendar.xyz/";
	$filename = $base_dir.'sitemap.xml';
	if (FALSE == ($fp = fopen($filename, "w"))){
		print "サイトマップを作成に失敗。ディレクトリのパーミッションを見直してください";
		exit();
	}
	$time = date("c");
	$tmp = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	$tmp .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
	//静的XMLサイトマップ
	$tmp .= '<sitemap>'."\n";
	$tmp .= '<loc>'.$statxml.'</loc>'."\n";
	$tmp .= '<lastmod>'.$time.'</lastmod>'."\n";
	$tmp .= '</sitemap>'."\n";
	//カレンダーXML
	$tmp .= '<sitemap>'."\n";
	$tmp .= '<loc>'.$calxml.'</loc>'."\n";
	$tmp .= '<lastmod>'.$time.'</lastmod>'."\n";
	$tmp .= '</sitemap>'."\n";
	for($i=1;$i<=$rtn_cnt;$i++)
	{
		$tmp .= '<sitemap>'."\n";
		$tmp .= '<loc>'.$dayxml.$i.'.xml</loc>'."\n";
		$tmp .= '<lastmod>'.$time.'</lastmod>'."\n";
		$tmp .= '</sitemap>'."\n";
	}
	$tmp .= '</sitemapindex>';
	fputs($fp,$tmp);
	fclose($fp);
}


//静的サイトマップ作成
$rtn = f_stat_sitemap();
//DBサイトマップ作成
// $rtn_cnt = f_day_sitemap($db_conn);
// //サイトマップ作成
// $rtn = f_sitemap_write($domain,$rtn_cnt);
//
echo $rtn_cnt;

?>