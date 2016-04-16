<?php
$copy = "© ".date('Y')." インテリカレンダー";
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
					<a href="https://www.facebook.com/icalendar.xyz" target="_blank"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
				</li>
				<li class="follow-btn">
					<a href="https://twitter.com/icalendar_xyz" target="_blank"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
				</li>
				<li class="tweet-btn">
					<a href="https://plus.google.com/+IcalendarXyz" target="_blank"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
				</li>
			</ul>
		</div>
		<!-- ソーシャルボタン -->
		<div>
		<p>
			<a href="/about/"> インテリカレンダーについて</a> | 
			<a href="/supportform/">
				<span class="glyphicon glyphicon-envelope"></span> お問い合わせフォーム
			</a>
		</p>
		</div>
		<div>
			<p><?=$copy?></p>
			<!-- <a href="http://atomb.it" target="_blank">atomb.it</a>. |  -->
			<!-- <a href="/terms/" target="_blank" rel="publisher">利用規約</a> |  -->
		</div>
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

 <script>
// click | hover | focus | manual 
$('.tooltip-tool').hover({
  selector: "a[data-toggle=hover]"
})
$("a[data-toggle=popover]").hover()
</script>
<!-- ページトップ -->
<script>
$(function(){
  var pageTop = $("#page-top");
  pageTop.hide();
  pageTop.click(function () {
    $('body, html').animate({ scrollTop: 0 }, 600);
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
<!-- 縦位置アラート -->

<!-- itunes -->
<script type='text/javascript'>var _merchantSettings=_merchantSettings || [];_merchantSettings.push(['AT', '1l3vnxV']);(function(){var autolink=document.createElement('script');autolink.type='text/javascript';autolink.async=true; autolink.src= ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(autolink, s);})();</script>
<!-- ituens -->
<script>
(function (w, d) {
w._gaq = [["_setAccount", "UA-54129226-1"],["_trackPageview"]];
w.___gcfg = {lang: "ja"};
var s, e = d.getElementsByTagName("script")[0],
a = function (u, i) {
if (!d.getElementById(i)) {
s = d.createElement("script");
s.src = u;
s.async = 1;
if (i) {s.id = i;}
e.parentNode.insertBefore(s, e);
}
};
a(("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js","ga");
a("https://apis.google.com/js/platform.js");
// a("//b.st-hatena.com/js/bookmark_button_wo_al.js");
a("//platform.twitter.com/widgets.js","twitter-wjs");
a("//connect.facebook.net/ja_JP/all.js#xfbml=1","facebook-jssdk");
a("https://widgets.getpocket.com/v1/j/btn.js");
})(this,document);
</script>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "WebSite",
"url": "http://icalendar.xyz/",
"potentialAction": {
 "@type": "SearchAction",
 "target": "http://icalendar.xyz/keyword/{search_term}",
 "query-input": "required name=search_term"
 }
}
</script>
<script type="text/javascript">
  amzn_assoc_ad_type = "link_enhancement_widget";
  amzn_assoc_tracking_id = "mittellogeblo-22";
  amzn_assoc_placement = "";
  amzn_assoc_marketplace = "amazon";
  amzn_assoc_region = "JP";
</script>
<script src="//z-fe.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&MarketPlace=JP"></script>
</body>
</html>