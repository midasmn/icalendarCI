<?php
?>
<style>
/*ページtopスクロール*/
#page-top{
  display: block;
  position: fixed;
  z-index: 9999;
  bottom: 15px;
  right: 20px;
  width: 70px;
  padding: 10px 5px;
/*  background: rgba(0,0,0,.7);
  color: #fff;*/
  text-align: center;
  text-decoration: none;
}
</style>
<!-- ページ -->
<div class="container  text-muted">
	<!-- パンくず -->
	<ol class="breadcrumb">
		<li><a href="/">インテリカレンダーホーム</a></li>
		<li class="active"><?=$exm_title?></li>
	</ol>
	<!-- パンくず -->

	<!-- 広告 -->
    <div class="col-md-12" style="margin-top: 10px;text-align: center;">
      <!-- ＜スポンサーリンク＞ -->
      <?php 
      if($mobile=="SP")
      {
      ?>
		<!-- ネンド -->
		<!-- .ネンド -->
      <?php }else{ ?>
      <!-- PC向けコンテンツ -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- ビッグバナー大 -->
		<ins class="adsbygoogle"
				style="display:inline-block;width:970px;height:90px"
				data-ad-client="ca-pub-6625574146245875"
				data-ad-slot="8563765200"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
      <?php }; ?>
    </div>
    <!-- 広告 -->


	<!-- 一覧 -->
	<div class="row" style="margin-top:20px;"  id="listroot">
		<div class="col-md-8">
			<h1 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;">
				インテリカレンダー<?=$exm_title?><small>(<?=number_format($total_cnt)?>件)</small>
			</h1> 
		</div>
	</div>
	<!--  -->
	<div class="row" style="margin-top:10px;">
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-1">アマゾンベストセラー</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-2">楽天市場ランキング</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-3">iTunesランキング</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-4">オリコンランキング</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-5">レコチョクランキング</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-6">スポーツ順位</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-7">Yahoo!検索デイリー</a></h2></p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3">
			<p><h2><a href="#cat-8">Google画像検索</a></h2></p>
		</div>
		
	</div>

	<hr>
	<?php
	$old_st = "";
	$cnt=1;
	foreach ($cal_info as $rowR) 
	{
		$exm_st = $rowR->cal_group;
		if($cnt==1){$old_st="";}
		$new_st = $exm_st;
		if($old_st==$new_st)
		{
		}else{
			echo '</div>';
			$old_st = $new_st;
			switch ($new_st) 
			{
				case 'amazon':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2 id="cat-1">アマゾンベストセラー</h2></p>';
					$tag_btn = "btn-warning";
					// echo '</div>';
					break;
				case 'rakuten':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2 id="cat-2">楽天市場ランキング</h2></p>';
					$tag_btn = "btn-danger";
					// echo '</div>';
					break;
				case 'iTunes':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2 id="cat-3">iTunesランキング</h2></p>';
					$tag_btn = "btn-success";
					// echo '</div>';
					break;
				case 'oricon':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2 id="cat-4">オリコンランキング</h2></p>';
					$tag_btn = "btn-success";
					break;
				case 'recochoku':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2 id="cat-5">レコチョクランキング</h2></p>';
					$tag_btn = "btn-success";
					break;
				case 'sports':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2  id="cat-6">スポーツ順位</h2></p>';
					$tag_btn = "btn-primary";
					break;
				case 'yahoo':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2  id="cat-7">Yahoo!検索デイリー</h2></p>';
					$tag_btn = "btn-danger";
					break;
				case 'google':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h2 id="cat-8">Google画像検索</h2></p>';
					$tag_btn = "btn-primary";
					// echo '</div>';
					break;
				


				default:

					break;
			}
		}
		// echo '<div class="col-xs-1 col-sm-1 col-md-1">';
		$st = $rowR->cal_title;
		$new_str = $st;
		$new_str = str_replace('男性ランキング', '', $st);
		$new_str = str_replace('女性ランキング', '', $new_str);
		$new_str = str_replace('ランキング', '', $new_str);
		$new_str = str_replace('ベストセラー', '', $new_str);
		$new_str = str_replace('デイリー', '', $new_str);
		$new_str = str_replace('アマゾン', '', $new_str);
		$new_str = str_replace('楽天市場', '', $new_str);
		$new_str = str_replace('Google画像', '', $new_str);
		$new_str = str_replace('Yahoo!', '', $new_str);
		$new_str = str_replace('オリコン', '', $new_str);
		$new_str = str_replace('iTunes', '', $new_str);
		$new_str = str_replace('「', '', $new_str);
		$new_str = str_replace('」', '', $new_str);
		$new_str = str_replace('[', '', $new_str);
		$new_str = str_replace(']', '', $new_str);
		$new_str = str_replace('プロ野球(NPB)', '', $new_str);
		if($rowR->cal_id==378){
			$new_str = '楽天総合';
		}
		echo '<a href="/calendar/'.$rowR->cal_id.'" stlye="margin:0 5px 5px; padding: 5px;">';
		echo '<button class="btn '.$tag_btn.'" >';
		echo '<small><i class="fa fa-tag">';
		echo '</i>  '.$new_str.'</small></button>';
		echo '</a>';

		$cnt++;			
	}
	?>
	</div>
	</div>
	<!--  -->
		<!-- 広告 -->
    <div class="col-md-12" style="margin-top: 10px;text-align: center;">
      <!-- ＜スポンサーリンク＞ -->
      <?php 
      if($mobile=="SP")
      {
      ?>
		<!-- ネンド -->
		<!-- .ネンド -->
      <?php }else{ ?>
      <!-- PC向けコンテンツ -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- ビッグバナー大 -->
		<ins class="adsbygoogle"
				style="display:inline-block;width:970px;height:90px"
				data-ad-client="ca-pub-6625574146245875"
				data-ad-slot="8563765200"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
      <?php }; ?>
    </div>
    <!-- 広告 -->
    
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<h2>
				<a href="" class="btn btn-default pull-right" id="page-top">
					<span class="glyphicon glyphicon-arrow-up"></span> To top</a>
			</h2>
		</div>
	</div>
</div>
<!--  -->
</div>

