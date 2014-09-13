<?php
// print_r($validation_err);
?>
<style>
#facebook_button 
{ 
border-radius: 5px; background: #4369be; background: -moz-linear-gradient(top, #4369be, #314e8d); 
background: -webkit-gradient(linear, left top, left bottom, from(#4369be), to(#314e8d)); 
background: linear-gradient(to bottom, #4369be, #314e8d); 
border: 1px solid #1d2f54; color: white; padding: 7px 0 4px 0; text-align: center; 
text-shadow: 0 -1px 1px #172441; text-decoration: none; display: block; 
}
</style>
<!-- ページ -->
<div class="container">
	<!-- 登録 -->
	<div class="row" style="margin-top:20px;">
		<div class="col-md-4 col-md-offset-4">
			<h3 style="color:dimgray;">無料登録する</h3>

			<?php
				// echo '<!-- エラー表示 -->';
				if($validation_err){
				echo '<div class="bs-callout bs-callout-danger alert-dismissable">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				// echo '<!-- エラーメッセージ -->';
				echo '<h5>入力内容をご確認ください:</h5>';
					echo '<li>';
					print_r($validation_err);
					echo '</li>';
				// print_r($validation_err);
								 	 			    
				echo '</div>';
				}
				// echo '<!-- エラー表示 -->';



				echo '<hr class="colorgraph">';
				$form_arr = array('class' => 'form-signin');
				echo form_open("/register/register_validation",$form_arr);	//フォームを開く
				echo form_hidden('_token','');	
				echo '<fieldset>';
				echo '<div class="input-group input-group-lg">';
  				echo '<span class="input-group-addon">';
    			echo '<span class="glyphicon glyphicon-envelope"></span>';
  				echo '</span>';
				$email_st = 'class="form-control middle" placeholder="メールアドレス" type="email"';
				echo form_input('email', $this->input->post('email'),$email_st);	//Emailの入力フィールドを出力	
				echo '</div>';
				echo '<div class="input-group input-group-lg">';
  				echo '<span class="input-group-addon">';
    			echo '<span class="glyphicon glyphicon-lock"></span>';
  				echo '</span>';
				$pass_st = 'class="form-control middle" placeholder="パスワード"';
				echo form_password('password',NULL,$pass_st);	//パスワードの入力フィールドを出力
				echo '</div>';
				echo '<div class="input-group input-group-lg">';
  				echo '<span class="input-group-addon">';
    			echo '<span class="glyphicon glyphicon-lock"></span>';
  				echo '</span>';
				$pass_conf_st = 'class="form-control bottom" placeholder="パスワード(確認)"';
				echo form_password('password_confirmation',NULL,$pass_conf_st);	//パスワードの入力フィールドを出力
				echo '</div>';
				echo '<br>';
				echo form_submit('login_submit', '登録する','class="btn btn-lg btn-primary btn-block"');
				echo '<p class="text-center" style="margin-top:10px;">OR</p>';
				echo '<a class="btn btn-default btn-block"  id="facebook_button" href="facebook">';
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
