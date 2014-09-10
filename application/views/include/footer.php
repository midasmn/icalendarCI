<?php
$copy = "iCalendar by ";
?>
<!-- フッター -->
<!-- フッター用設定 -->
<footer class="bs-footer" role="contentinfo">
	<div class="container">
		<!-- ソーシャルボタン -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<div class="bs-social">
			<ul class="bs-social-buttons">
				<li class="facebook-button">
					<a href="https://www.facebook.com/icalendar.xyz"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
				</li>
				<li class="follow-btn">
					<a href="https://twitter.com/icalendar_xyz"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
				</li>
				<li class="tweet-btn">
					<a href="https://plus.google.com/110272837598113958103/posts/p/pub"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
				</li>
			</ul>
		</div>
		<!-- ソーシャルボタン -->

		<!-- リンク -->
		<p><?=$copy?>
			<a href="http://atomb.it" target="_blank">atomb.it</a>. | 
			<!-- <a href="/terms/" target="_blank" rel="publisher">利用規約</a> |  -->
			<a href="/terms/" >利用規約</a> | 
			<a href="/privacy/">プライバシー</a>
		</p>
		<!-- リンク -->

	</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('/application/views/assets/js/bootstrap.min.js') ?>"></script>
<!-- SNSボタン用 -->
<script src="<?php echo base_url('/application/views/assets/js/modernizr-2.6.2-respond-1.1.0.min.js') ?>"></script>
<script src="<?php echo base_url('/application/views/assets/js/rrssb.min.js') ?>"></script>
<!-- ドロップダウン用 -->
<!-- <script>
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
</script> -->
<!-- ドロップダウン用 -->
 <!-- ポップオーバー -->
 <script>
$('.tooltip-tool').tooltip({
  selector: "a[data-toggle=tooltip]"
})
$("a[data-toggle=popover]").popover()
</script>
<!-- ページトップ -->
<script>
$(function(){
  var pageTop = $("#page-top");
  pageTop.hide();
  pageTop.click(function () {
    $('body, html').animate({ scrollTop: 0 }, 500);
    return false;
  });
  $(window).scroll(function () { 
    if($(this).scrollTop() >= 200) { 
      pageTop.fadeIn();
    } else {
      pageTop.fadeOut();
    }
  });
});
</script>
<!-- ページトップ -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54129226-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>