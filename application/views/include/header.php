<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCalendar | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- footer -->
    <link href="<?php echo base_url('assets/css/footer.css') ?>" rel="stylesheet">

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
		<div class="container">
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
					<li class="dropdown ">
		       			<a href="guide" class="dropdown-toggle" data-toggle="dropdown">
		       				<span class="glyphicon glyphicon-book"></span> ガイド <b class="caret"></b>
		       			</a>
		       			<ul class="dropdown-menu">
		          			<li class="">
		          				<a href="about">
		          					<span class="glyphicon glyphicon-info-sign"></span> iCalendarについて
		          				</a>
		          			</li>
		          			<li class="divider"></li>
							<li class="">
								<a href="terms">
									<span class="glyphicon glyphicon-list-alt"></span> 利用規約
								</a>
							</li>
							<li class="">
								<a href="privacy">
									<span class="glyphicon glyphicon-list-alt"></span> プライバシーポリシー
								</a>
							</li>
							<li class="divider"></li>
							<li class="dropdown-header">よくある質問</li>
							<li class="">
								<a href="faq">
									<span class="glyphicon glyphicon-book"></span> FAQ
								</a>
							</li>  
							<li class="divider"></li>
							<li class="">
								<a href="supportform">
									<span class="glyphicon glyphicon-envelope"></span> お問い合わせフォーム
								</a>
							</li> 
						</ul>
					</li>
					<li class="dropdown ">
		       			<a href="list" class="dropdown-toggle" data-toggle="dropdown">
		       				<span class="glyphicon glyphicon-calendar"></span> カレンダ一覧 <b class="caret"></b>
		       			</a>
		       			<ul class="dropdown-menu">
		          			<li class="">
		          				<a href="smart">
		          					<span class="glyphicon glyphicon glyphicon-star"></span> 人気順
		          				</a>
		          			</li>
							<li class="">
								<a href="newer">
		          					<span class="glyphicon glyphicon-sort-by-attributes-alt"></span> 新着順
								</a>
							</li>
							<li class="">
								<a href="random">
									<span class="glyphicon glyphicon-align-center"></span> ランダム
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- Split button -->
<!-- 		        <div class="btn-group navbar-form">
					<button type="button" class="btn">
						<span id="visibleValue">Action</span>
					</button>
					<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" hiddenTag="#hiddenValue" visibleTag="#visibleValue">
						<li><a href="javascript:void(0)" value="Action">Action</a></li>
						<li><a href="javascript:void(0)" value="Another action">Another action</a></li>
						<li><a href="javascript:void(0)" value="SSomething else hereXXXXXXXXX">Something else hereXXXXXXXXX</a></li>
						<li class="divider"></li>
						<li><a href="javascript:void(0)" value="Separated link">Separated link</a></li>
					</ul>
					<input type="hidden" id="hiddenValue" value="">
		        </div> -->
					
				<div class="btn-group navbar-form">
					<form action="index.php" method="GET">
                		<select class="form-control" name="calselect"  onchange="submit(this.form)">
                  			<li class=" selected version-chooser">
                  				<option selected value="1">誕生石</option>
                  			<li class=" version-chooser">
                  				<option value="2">誕生花</option>          
                		</select>
                	</form>
            	</div>






				<!-- Split button -->
				<!-- 検索窓 -->
<!-- 			    <div class="col-sm-3 col-md-3">
			        <form class="navbar-form" role="search" action="http://bootsnipp.com/search" method="GET" id="search-form">
			        <div class="input-group">
			            <input type="text" class="form-control" placeholder="Search featured snippets" name="q" style="padding:6px 6px;">
			            <div class="input-group-btn">
			                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
			        </form>
			    </div> -->
				<!-- 検索窓 -->
				<!-- ログイン前 -->
				<ul class="nav navbar-nav navbar-right">
            		<li id="nav-register-btn" class="">
            			<a href="register">登録</a>
            		</li>
       				<li id="nav-login-btn" class="">
       					<a href="login">
       					<i class="icon-login"></i> ログイン</a>
       				</li>
         		</ul>
				<!-- ログイン前 -->
				<!-- ログイン後 -->
<!-- 				<ul class="nav navbar-nav navbar-right">
					<li><a href="new">
						<span class="glyphicon glyphicon-plus"></span>新規</a>
					</li>
					<li class="active"><a href="user">
						<span class="glyphicon glyphicon-th-list"></span>マイカレンダー</a>
					</li>
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="http://bootsnipp.com/img/avatars/1392936b2a44e53420370564ffec3377f26d27da.jpg" width="18px" class="user-avatar-mini">プロフィール
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li class=""><a href="favorites">お気に入り</a></li>
							<li class=""><a href="settings">設定</a></li>
							<li><a href="logout">ログアウト</a>
							</li>
						</ul>
					</li>
				</ul> -->
				<!-- ログイン後 -->

  			</div><!-- /.navbar-collapse -->
  		</div>
	</nav>
	<!-- ナビゲーションバー -->
    <script type="text/javascript">window.alert = function(){}</script>
