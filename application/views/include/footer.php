<?php
$copy = "iCalendar by ";
?>
<!-- フッター -->
<!-- フッター用設定 -->
<footer class="bs-footer" role="contentinfo">
	<div class="container">
		<!-- ソーシャルボタン -->
		<div class="bs-social">
			<ul class="bs-social-buttons">
				<li class="facebook-button">
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fbootsnipp.com&amp;width=130&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=true&amp;appId=112989545392380" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:20px;" class="facebook-btn" allowTransparency="true">
					</iframe>
				</li>
				<li class="follow-btn">
					<iframe allowtransparency="true" frameborder="0" scrolling="no"
						src="//platform.twitter.com/widgets/follow_button.html?screen_name=bootsnipp"
						style="width:236px; height:20px;" class="twitter-follow-button twitter-follow-button">
					</iframe>
				</li>
				<li class="tweet-btn">
					<iframe allowtransparency="true" frameborder="0" scrolling="no"
					src="https://platform.twitter.com/widgets/tweet_button.html?lang=en&via=bootsnipp&url=http%3A%2F%2Fbootsnipp.com&text=RT%20Design%20elements%20and%20code%20snippets%20for%20%23twbootstrap%20HTML%2FCSS%2FJS%20framework"
					style="width:107; height:20px;" class="twitter-share-button twitter-count-horizontal">
					</iframe>
				</li>
			</ul>
		</div>
		<!-- ソーシャルボタン -->

		<!-- リンク -->
		<p><?=$copy?>
			<a href="http://atomb.it" target="_blank">atomb.it</a>. | 
			<a href="#" target="_blank" rel="publisher">Google+</a> | 
			<a href="terms" target="_blank" rel="publisher">利用規約</a> | 
			<a href="privacy">プライバシーポリシー</a>
		</p>
		<!-- リンク -->

	</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('/application/views/assets/js/bootstrap.min.js') ?>"></script>
<!-- ドロップダウン用 -->
<script>
$(function(){
  $('.dropdown-menu a').click(function(){
    //反映先の要素名を取得
    var visibleTag = $(this).parents('ul').attr('visibleTag');
    var hiddenTag = $(this).parents('ul').attr('hiddenTag');
    //選択された内容でボタンの表示を変える
    $(visibleTag).html($(this).attr('value'));
    //選択された内容でhidden項目の値を変える
    $(hiddenTag).val($(this).attr('value'));
  })
})
</script>
<!-- ドロップダウン用 -->
 <!-- ポップオーバー -->
 <script>
$('.tooltip-tool').tooltip({
  selector: "a[data-toggle=tooltip]"
})
$("a[data-toggle=popover]").popover()
</script>
</body>
</html>