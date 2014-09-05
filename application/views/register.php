<?php
print_r($validation_err);
?>
<!-- ページ -->
<div class="container">
	<!-- 登録 -->
	<div class="row" style="margin-top:20px;">
		<div class="col-md-4 col-md-offset-4">
			<h3 style="color:dimgray;">無料登録する</h3>

			<?php
				// echo '<!-- エラー表示 -->';
				if($message=='registerr'){
				echo '<div class="bs-callout bs-callout-danger alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				// echo '<!-- エラーメッセージ -->';
				echo '<h5>There were errors during registration:</h5>';
				echo '<li>The username has already been taken.</li>';				 	 			    
				echo '</div>';
				}
				// echo '<!-- エラー表示 -->';



				echo '<hr class="colorgraph">';
				$form_arr = array('class' => 'form-signin');
				echo form_open("/register/register_validation",$form_arr);	//フォームを開く
				echo form_hidden('_token','');	
				echo '<fieldset>';
				//<!-- <input class="form-control" placeholder="Username" name="username" type="text" value="">		
				$email_st = 'class="form-control middle" placeholder="メールアドレス" type="email"';
				echo form_input('email', $this->input->post('email'),$email_st);	//Emailの入力フィールドを出力	
				$pass_st = 'class="form-control middle" placeholder="パスワード"';
				echo form_password('password',NULL,$pass_st);	//パスワードの入力フィールドを出力
				$pass_conf_st = 'class="form-control bottom" placeholder="パスワード(確認)"';
				echo form_password('password_confirmation',NULL,$pass_conf_st);	//パスワードの入力フィールドを出力
				echo form_submit('login_submit', '登録する','class="btn btn-lg btn-primary btn-block"');
				echo '<p class="text-center" style="margin-top:10px;">OR</p>';
				echo '<a class="btn btn-default btn-block" href="facebook">';
				echo '<i class="icon-github"></i> Fcebookアカウントを使って登録';
				echo '</a>';
				echo '<br>';
				echo '<p class="text-center">';
				echo '<a href="/login/">すでにIDをお持ちですか?</a>';
				echo '</p>';
				echo '</fieldset>';
				echo form_close();	//フォームを閉じる
			?>



		</div>
	</div>
	<!-- 登録 -->
</div>
<!-- ページメイン -->
</div>
