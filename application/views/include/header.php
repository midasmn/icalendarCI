<?php
foreach ($calcnt as $row) {}
foreach ($keyitem as $rowKey) {}
foreach ($day_cnt as $rowD) {
	foreach ($rowD as $key2 => $value)
	{
		if($key2=='category_cnt'){$jan_cnt=number_format($value);}
		elseif($key2=='day_cnt'){$daycnt=number_format($value);}
		elseif($key2=='item_cnt'){$ymdcnt=number_format($value);}
	}
}
$keyword = $this->input->post('keyword');
if(!$keyword){$keyword=$flash_keyword;}
$keyword_total_cnt = count($rowKey);
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
    <meta name="keywords" content="<?=$keywords?>">
	<meta name="description" content="<?=$description?>">
    <!-- ファビコン・アイコン -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
	<!-- ファビコン・アイコン -->
	<!-- OGP -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$og_title?>" />
	<meta property="og:image" content="http://faceapglezon.info/ogimage/icalendar.php?url=<?php echo current_url();?>" />
<!-- 	<meta property="og:image" content="<?=$og_image?>" /> -->
	<meta property="og:url" content="<?=$og_url?>" />
	<meta property="og:site_name" content="インテリカレンダー" />
	<meta property="og:description" content="<?=$og_description?>" />
	<meta property="og:locale" content="ja_JP” />
	<!-- bingmastertools -->
	<meta name="msvalidate.01" content="16F2AAB151C9B16A6C0B7CEE62D45BEB" />
	<meta itemprop="name" content="インテリカレンダー" />
	<meta itemprop="description" content="<?=$og_description?>" />
	<meta property="fb:app_id" content="1459017077694190" /> 
	<meta property="article:publisher" content="https://www.facebook.com/icalendar.xyz" />
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@icalendar_xyz">
	<meta property="twitter:account_id" content="2761857000" />
	<!-- OGP -->
    <!-- Bootstrap -->
    <link href="<?php echo base_url('/application/views/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- footer -->
    <link href="<?php echo base_url('/application/views/assets/css/footer.css'); ?>" rel="stylesheet">
	<!-- SNSボタン -->
	<link href="<?=base_url('/application/views/assets/css/normalize.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('/application/views/assets/css/rrssb.css')?>" rel="stylesheet">
	<!-- SNSボタン -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- nend -->
    <script type="text/javascript">
var nend_params = {"media":26557,"site":140390,"spot":565363,"type":2,"oriented":1};
</script>
<script type="text/javascript" src="https://js1.nend.net/js/nendAdLoader.js"></script>
	<!-- .nend -->
  </head>
<body>
<div id="dev_position"></div>
<div id="wrap">
	<!-- ナビゲーションバー -->
	<!-- <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0;"> -->
	<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0;">
		<div class="container" >
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-bootsnipp-collapse">
				  <span class="sr-only">Toggle navigation</span>
<!-- 				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span> -->
				  MENU
				</button>
				<!-- <div class="animbrand"> -->
					<a class="navbar-brand" href="http://icalendar.xyz/">
        				<!-- <img alt="iCalendar.xyz" src="/menulogo.png"> -->
      				</a>
			<!-- 	</div> -->
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-bootsnipp-collapse">
				<ul class="nav navbar-nav">
					<!-- リスト -->
					<li class="">
		       			<a href="/sitemap/">
							<i class="fa fa-tags"></i> ジャンル一覧
						</a>
					</li>
					<!-- リスト -->
				</ul>
				<ul class="nav navbar-nav">
					<!-- リスト -->
					<li class="">
		       			<a href="/smart/">
							<i class="fa fa-heart"></i> 人気順一覧
						</a>
					</li>
					<!-- リスト -->
				</ul>

				<ul class="nav navbar-nav navbar-right">
        			<li class="">
        				登録:<?=$jan_cnt?>ジャンル
        			</li>
   					<li class="">
   						<span class="glyphicon glyphicon-calendar"> </span>掲載日数:<?=$daycnt?>日
   					</li>
   					<li  class="">
   						<i class="fa fa-camera"> </i>画像数:<?=$ymdcnt?>点
   					</li>
     			</ul>

				

  			</div><!-- /.navbar-collapse -->
  		</div>
	</nav>
