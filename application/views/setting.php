	<style>
	.btn_choose {
	color: #fff;
	border: 2px solid rgba(255,255,255,.4);
	padding: 5px 10px;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	background-color: rgba(0,0,0,.4);
	*background-color: #aaa;
	}
	.userpic {
	width: 100px;
	height: 100px;
	float: left;
	border: 2px solid #ccc;
	border-radius: 3px;
	display: inline-block;
	position: relative;
	background: url('../img/no-userpic-big.gif') no-repeat;
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	background-size: 100% 100%;
	}
	.btn input {
	top: -10px;
	right: -40px;
	z-index: 2;
	position: absolute;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
	font-size: 50px;
	cursor: pointer;
	}
	.btn-txt {
	position: relative;
	}
	</style>






<!-- ページ -->
<div class="container">
	<!-- 設定画面 -->
	<div class="row" style="margin-top:20px;">
		<!-- <div class="col-md-5"> -->
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<!-- <h3 class="panel-title">
						<a href="javascript:window.history.go(-1);" class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-left"></span> 戻る
						</a> 登録情報設定
					</h3> -->
					<h3 class="sign-up-title" style="color:dimgray;">登録情報設定</h3>
				</div>
				<div class="panel-body">
					<!-- エラーメッセージ -->
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<li>The password confirmation does not match.</li>                        
					</div>
					<!-- エラーメッセージ -->
					<form method="POST" action="settings" accept-charset="UTF-8" role="form" id="loginform" class="form-horizontal">
						<input name="_token" type="hidden" value="WvxtSQClxbmmB9c6ADWaPfUK7Ao9loNih8H6mPhy">
						<fieldset>
							<div class="form-group ">
								<label for="email" class="col-lg-4 control-label">ニックネーム</label>
								<div class="col-lg-8">
									<input class="form-control" placeholder="ニックネーム" name="username" type="text" value="">           
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-lg-4 control-label">メールアドレス</label>
								<div class="col-lg-8">
									<input type="email" disabled class="form-control" id="email" placeholder="メールアドレス">
								</div>
							</div>

							<div class="form-group">
								<label for="avatar" class="col-lg-4 control-label">プロフィール画像</label>
								<div class="col-lg-8">
									<input type="hidden" id="avatar-hidden" name="avatar" value="">
									<div id="upload-avatar" class="upload-avatar">
										<div class="userpic" style="background-image: url('https://secure.gravatar.com/avatar/a4ebeab0c3ce53865b69111d531cd91d?s=100&amp;r=g&amp;d=mm');">
											<div class="js-preview userpic__preview"></div>
										</div>
										<div class="btn btn-sm btn-success js-fileapi-wrapper">
											<div class="js-browse">
												<span class="btn-txt">変更する</span>
												<input type="file" name="filedata">
											</div>
											<div class="js-upload" style="display: none;">
												<div class="progress progress-success">
													<div class="js-progress bar"></div>
												</div>
											<span class="btn-txt">Uploading</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<input name="stamp" type="hidden">
							<div class="form-group">
								<label for="password" class="col-lg-4 control-label">パスワード</label>
								<div class="col-lg-8">
									<input class="form-control" placeholder="新しいパスワード" name="password" type="password" value="">              
								</div>
							</div>
							<div class="form-group">
								<label for="password_confirmation" class="col-lg-4 control-label">パスワード(確認)</label>
								<div class="col-lg-8">
									<input class="form-control" placeholder="パスワード(確認)" name="password_confirmation" type="password" value="">              
								</div>
							</div>

<!-- 							<div class="form-group">
								<label for="newsletter" class="col-lg-4 control-label">News &amp; Updates</label>
								<div class="col-lg-8">
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#subscribe"> Subscribe</button>
								</div>
							</div> -->
<!-- 							<div class="form-group">
								<label for="github" class="col-lg-4 control-label">Github profile</label>
								<div class="col-lg-8">
									<img src="http://bootsnipp.com/img/icons/github.jpg" alt="Github profile">
									Not connected. 
									<a href="http://bootsnipp.com/login/github">Connect?</a>
								</div>
							</div> -->
							<div class="form-group">
								<div class="col-lg-offset-7 col-lg-12">
									<input class="btn btn-sm" type="reset" value="リセット"> 
									<input class="btn btn-info" type="submit" value="設定する">
								</div>
							</div>
						</fieldset>
					</form>        
				</div>
			</div>

			<div class="text-right" style="margin-bottom: 30px;">
				<a href="#" data-toggle="modal" data-target="#delete_account">登録を解除する</a>
			</div>
		</div>
			<div class="col-md-7">
				<div id="cropper-preview" style="display:none;">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title"> Crop the picture </h3>
						</div>
						<div class="panel-body">
							<div class="js-img"></div>
							<p><div class="js-upload btn btn-primary">変更する</div></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 設定 -->
</div>
