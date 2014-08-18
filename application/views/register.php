<!-- ページ -->
<div class="container">
	<!-- 登録 -->
	<div class="row" style="margin-top:40px;">
		<div class="col-md-4 col-md-offset-4">
			<h3 style="color:dimgray;">iCalendarID(無料)を登録する</h3>
			<!-- エラー表示 -->
			<div class="bs-callout bs-callout-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<!-- エラーメッセージ -->
				<h5>There were errors during registration:</h5>
				<li>The username has already been taken.</li>				 	 			    
			</div>
			<!-- エラー表示 -->
			<hr class="colorgraph">
				<form method="POST" action="register" accept-charset="UTF-8" role="form" class="form-signin">
					<input name="_token" type="hidden" value="">		
					<fieldset>
						<!-- <input class="form-control" placeholder="Username" name="username" type="text" value="midasmn">			    	 -->
						<input class="form-control middle" placeholder="メールアドレス" name="email" type="text" value="">			    	
						<input class="form-control middle" placeholder="パスワード" name="password" type="password" value="">			    	
						<input class="form-control bottom" placeholder="パスワード(確認)" name="password_confirmation" type="password" value="">				    
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">		
						<p class="text-center" style="margin-top:10px;">OR</p>
						<a class="btn btn-lg btn-default btn-block" href="facebook">
							<i class="icon-github"></i> Facebookアカウントを使って登録
						</a>
						<br>
						<p class="text-center">
							<a href="login">すでにIDをお持ちですか?</a>
						</p>
					</fieldset>
				</form>		
		</div>
	</div>
	<!-- 登録 -->
</div>
<!-- ページメイン -->
<!-- </div> -->
