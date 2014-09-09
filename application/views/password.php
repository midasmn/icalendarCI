<!-- ページ -->
<div class="container">
	<!-- パスワード忘れ -->
	<div class="row" style="margin-top:20px;">
		<div class="col-md-4 col-md-offset-4">

			<?php
				$form_arr = array('class' => 'form-signin');
				echo form_open("/password/password_validation",$form_arr);	//フォームを開く
				// <!-- <input name="_token" type="hidden" value="">		 -->
				echo '<fieldset>';
				echo '<h3 class="sign-up-title" style="color:dimgray;">パスワードを再設定する</h3>';
				// echo '<!-- エラーメッセージ -->
				if($message=='loginerr'){
				echo '<div class="alert alert-success alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo 'ご入力いただいたメールアドレスでは登録がありません。<br>';
				echo 'はじめてご利用の場合やご登録アドレスをお忘れの場合には、';
				echo '<a href="/register/">会員登録</a>をお願いします。';
				echo '</div>';
				}
				// echo '<!-- エラーメッセージ -->
				echo '<hr class="colorgraph">';
				$email_st = 'class="form-control email-title" placeholder="メールアドレス" type="email"';
				echo form_input('email', $this->input->post('email'),$email_st);	//Emailの入力フィールドを出力	
				echo '<p>';		
				echo form_submit('submit', 'パスワードを再設定する','class="btn btn-lg btn-success btn-block"');
				echo '</p>';
				echo '<p class="text-center">パスワードを思い出した方';
				echo '<a href="/login/">こちらからログイン</a>';
				echo '</p>';
				echo '</fieldset>';
				echo form_close();	//フォームを閉じる
			?>

		</div>
	</div>
	<!-- パスワード忘れ -->
</div>
<!-- ページメイン -->
</div>
