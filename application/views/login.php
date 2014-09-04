<!-- ページ -->
<div class="container">
	<!-- ログイン -->
	<div class="row" style="margin-top:20px;">
		<div class="col-md-4 col-md-offset-4">
	
			<?php
				$form_arr = array('class' => 'form-signin');
				echo form_open("/login/login_validation",$form_arr);	//フォームを開く
				echo '<fieldset>';
				echo '<h3 class="sign-up-title" style="color:dimgray;">ログイン</h3>';
				// echo '<!-- ログインエラーメッセージ -->';
				if($message=='loginerr'){
				echo '<div class="bs-callout bs-callout-danger alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo '<h5>';
				echo 'メールアドレスかパスワードが異なります。';
				echo "<br>もう一度ご確認ください。";
				echo '</h5>';
				echo '</div>';
				}
				// echo '<!-- ログインエラーメッセージ -->';
				echo '<hr class="colorgraph">';
				$email_st = 'class="form-control email-title" placeholder="メールアドレス"';
				echo form_input('email', $this->input->post('email'),$email_st);	//Emailの入力フィールドを出力	
				$pass_st = 'class="form-control" placeholder="パスワード"';
				echo form_password('password',NULL,$pass_st);	//パスワードの入力フィールドを出力
				echo '<a class="pull-right" href="/password/">パスワード、登録情報を忘れてしまった方</a>';
				echo '<div class="checkbox">';
				echo '<label>';
				echo form_checkbox('remember' ,'Remember Me');
				echo 'パスワードを記憶する?';
				echo '</label>';
				echo '</div>';
				// $submit_array = array('name'=>'login_submit' ,'volue'=>'ログイン', "ログイン"'class' => 'btn btn-lg btn-success btn-block');
				echo form_submit('login_submit', 'ログイン','class="btn btn-lg btn-success btn-block"');
				echo '<p class="text-center" style="margin-top:10px;">OR</p>';
				echo '<a class="btn btn-default btn-block" href="facebook">';
				echo '<i class="icon-github"></i> Fcebookアカウントを使って登録';
				echo '</a>';
				echo '<br>';
				echo '<p class="text-center">';
				echo '<a href="/register/">ID(無料)をお持ちでない方</a>';
				echo '</p>';
				echo '</fieldset>';
				echo form_close();	//フォームを閉じる
			?>

		</div>
	</div>
	<!-- ログイン -->
</div>
<!-- ページメイン -->
</div>

