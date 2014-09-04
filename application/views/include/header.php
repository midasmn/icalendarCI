<?php
// $title = "iCalendarテスト";
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
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
	<meta property="og:image" content="<?=$og_image?>" />
	<meta property="og:url" content="<?=$og_url?>" />
	<meta property="og:site_name" content="iCalendar" />
	<meta property="og:description" content="<?=$og_description?>" />
	<meta property=”og:locale” content=”ja_JP” />
	<meta itemprop="name" content="iCalendar" />
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

<div id="wrap">
	<!-- ナビゲーションバー -->
	<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0;">
		<div class="container" >
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-bootsnipp-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<div class="animbrand"><a class="navbar-brand" href="http://icalendar.xyz">iCalendar</a></div>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-bootsnipp-collapse">
				<ul class="nav navbar-nav">
					<!-- リスト -->
					<li class="dropdown ">
		       			<a href="" class="dropdown-toggle" data-toggle="dropdown">
		       				<span class="glyphicon glyphicon-calendar"></span> カレンダ一覧 <b class="caret"></b>
		       			</a>
		       			<ul class="dropdown-menu">
		          			<li class="">
		          				<a href="/smart/">
		          					<span class="glyphicon glyphicon glyphicon-star"></span> 人気順
		          				</a>
		          			</li>
							<li class="">
								<a href="/newer/">
		          					<span class="glyphicon glyphicon-sort-by-attributes-alt"></span> 新着順
								</a>
							</li>
							<li class="">
								<a href="/random/">
									<span class="glyphicon glyphicon-align-center"></span> ランダム
								</a>
							</li>
						</ul>
					</li>
					<!-- リスト -->
					<!-- ガイド -->
					<li class="dropdown ">
		       			<a href="guide" class="dropdown-toggle" data-toggle="dropdown">
		       				<span class="glyphicon glyphicon-book"></span> ガイド <b class="caret"></b>
		       			</a>
		       			<ul class="dropdown-menu">
		          			<li class="">
		          				<a href="/about/">
		          					<span class="glyphicon glyphicon-info-sign"></span> iCalendarについて
		          				</a>
		          			</li>
		          			<li class="divider"></li>
							<li class="">
								<a href="/terms/">
									<span class="glyphicon glyphicon-list-alt"></span> 利用規約
								</a>
							</li>
							<li class="">
								<a href="/privacy/">
									<span class="glyphicon glyphicon-list-alt"></span> プライバシーポリシー
								</a>
							</li>
							<li class="divider"></li>
							<li class="dropdown-header">よくある質問</li>
							<li class="">
								<a href="/faq/">
									<span class="glyphicon glyphicon-book"></span> FAQ
								</a>
							</li>  
							<li class="divider"></li>
							<li class="">
								<a href="/supportform/">
									<span class="glyphicon glyphicon-envelope"></span> お問い合わせフォーム
								</a>
							</li> 
						</ul>
					</li>
					<!-- ガイド -->

				</ul>
				<!-- お気に入りセレクト -->
				<div class="btn-group navbar-form">
					<form action="/calendar/" method="POST">
                		<select class="form-control" name="index"  onchange="submit(this.form)">
                  			<li class=" selected version-chooser">
                  				<option selected value="1">誕生石</option>
                  			</li>
                  			<li class=" version-chooser">
                  				<option value="2">誕生花</option> 
                  			</li>         
                		</select>
                	</form>
            	</div>
				<!-- お気に入りセレクト -->

				<?php
				if($status=="LOGIN")
				{
					echo '<!-- ログイン後 -->';
					echo '<ul class="nav navbar-nav navbar-right">';
					echo '<li><a href="/add/">';
					echo '<span class="glyphicon glyphicon-plus"></span>新規</a>';
					echo '</li>';
					echo '<li class="active">';
					echo '<a href="/mycalendar/">';
					echo '<span class="glyphicon glyphicon-th-list"></span>マイカレンダー</a>';
					echo '</li>';
					echo '<li class="dropdown ">';
					echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
					echo '<img src="'.$profile_img.'" width="18px" class="user-avatar-mini">';
					echo $email;
					echo '<b class="caret"></b>';
					echo '</a>';
					echo '<ul class="dropdown-menu">';
					echo '<li class=""><a href="/favorites/">お気に入り</a></li>';
					echo '<li class=""><a href="/settings/">設定</a></li>';
					echo '<li><a href="/logout/">ログアウト</a>';
					echo '</li>';
					echo '</ul>';
					echo '</li>';
					echo '</ul>';
					echo '<!-- ログイン後 -->';
				}else{
					echo '<!-- ログイン前 -->';
					echo '<ul class="nav navbar-nav navbar-right">';
            		echo '<li id="nav-register-btn" class="">';
            		echo '<a href="/register/">登録</a>';
            		echo '</li>';
       				echo '<li id="nav-login-btn" class="">';
       				echo '<a href="/login/">';
       				echo '<i class="icon-login"></i> ログイン</a>';
       				echo '</li>';
         			echo '</ul>';
					echo '<!-- ログイン前 -->';
				}
				?>
				

  			</div><!-- /.navbar-collapse -->
  		</div>
	</nav>
	<!-- ナビゲーションバー -->
    <script type="text/javascript">window.alert = function(){}</script>
