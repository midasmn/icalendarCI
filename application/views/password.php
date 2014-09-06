<!-- ページ -->
<div class="container">
	<!-- パスワード忘れ -->
	<div class="row" style="margin-top:20px;">
		<div class="col-md-4 col-md-offset-4">
			<!-- エラーメッセージ -->
			<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Password reminder sent! Please check your email for instructions on resetting your password.
			</div>
			<!-- エラーメッセージ -->
			<form method="POST" action="/password/" accept-charset="UTF-8" role="form" id="loginform" class="form-signin">
				<!-- <input name="_token" type="hidden" value="">		 -->
				<fieldset>
					<h2>パスワードを再設定する</h2>
					<hr class="colorgraph">
					<input class="form-control" placeholder="メールアドレス" name="email" type="text">	
					<p>
						<input class="btn btn-lg btn-success btn-block" type="submit" value="パスワードを再設定する">			
					</p>
					<p class="text-center">パスワードを思い出した方
						<a href="/login/">こちらからログイン</a>
					</p>
				</fieldset>
			</form>		
		</div>
	</div>
	<!-- パスワード忘れ -->
</div>
<!-- ページメイン -->
</div>
