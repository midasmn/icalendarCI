<!-- ページ -->
<div class="container">
	<!-- ログイン -->
	<div class="row" style="margin-top:60px;">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST" action="login" accept-charset="UTF-8" role="form" id="loginform" class="form-signin">
				<input name="_token" type="hidden" value="WvxtSQClxbmmB9c6ADWaPfUK7Ao9loNih8H6mPhy">		
				<fieldset>
					<h3 class="sign-up-title" style="color:dimgray;">ログイン</h3>
					<!-- ログインエラーメッセージ -->
					<div class="bs-callout bs-callout-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5>E-mail or password was incorrect, please try again</h5>
					</div>
					<!-- ログインエラーメッセージ -->
					<hr class="colorgraph">
					<input class="form-control email-title" placeholder="E-メールアドレス" name="email" type="text" value="">				    
					<input class="form-control" placeholder="パスワード" name="password" type="password" value="">				    
					<a class="pull-right" href="password">パスワード、登録情報を忘れてしまった方</a>
					<div class="checkbox">
						<label><input name="remember" type="checkbox" value="Remember Me"> パスワードを記憶する?</label>
					</div>
					<input class="btn btn-lg btn-success btn-block" type="submit" value="ログイン">			
					<p class="text-center" style="margin-top:10px;">OR</p>
					<a class="btn btn-default btn-block" href="facebook">
						<i class="icon-github"></i> Fcebookアカウントを使って登録
					</a>
					<br>
					<p class="text-center">
					<a href="register">iCalendarID(無料)をお持ちでない方</a>
					</p>
				</fieldset>
			</form>		
		</div>
	</div>
	<!-- ログイン -->
</div>
<!-- ページメイン -->
