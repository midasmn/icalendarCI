<?php
// foreach ($keyitem as $cnt_key => $keyitem){}
// $keyword_total_cnt = count($keyitem);
?>
<style>
.fc-head{
font-weight: 300;
text-transform: uppercase;
font-size: 12px;
letter-spacing: 3px;
text-shadow: 0 1px 1px rgba(0,0,0,0.4);
text-align: center;
}
.fc-date {
position: relative;
}
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
/*#page-top:hover{
  background: rgba(0,0,0,.8);
}*/
</style>

<!-- ページ -->
<div class="container">
	<!-- パンくず -->
	<ol class="breadcrumb">
		<li><a href="/smart/">ホーム</a></li>
		<li class="active"><?=$exm_title?></li>
	</ol>
	<!-- パンくず -->

	<!-- 広告 -->
    <div class="col-md-12" style="margin-top: 20px;text-align: center;">
      <!-- ＜スポンサーリンク＞ -->
      <?php 
      if($mobile=="SP")
      {
      ?>
		<!-- スマートフォン向けコンテンツ -->
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- ical_sp_btm -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:320px;height:100px"
		     data-ad-client="ca-pub-6625574146245875"
		     data-ad-slot="5295238802"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
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
			<h2 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;"><?=$exm_title?>
			<small>(<?=number_format($total_cnt)?>件)</small></h2> 
		</div>

	</div>
	<hr id="1">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="col-md-1 fc-head">画像</th>
						<th class="col-md-2 fc-head">年月日</th>
						<th class="col-md-1 fc-head">順位</th>
						<th class="col-md-3 fc-head hidden-xs">カレンダー名</th>
						<th class="col-md-5 fc-head hidden-xs">アイテム名</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($keyitem as $key1 => $item)
					{
						foreach ($item as $key2 => $value)
						{
					// <!-- 1件目 -->
						if($key2=='key_img_path'){$htm_key_img=$value;}
						elseif($key2=='key_calendar_id'){$key_calendar_id=$value;}
						elseif($key2=='key_yyyy'){$htm_key_yyyy=$value;}
						elseif($key2=='key_mm'){$htm_key_mm=$value;}
						elseif($key2=='key_dd'){$htm_key_dd=$value;}
						elseif($key2=='key_name'){$htm_key_name=$value;}
						elseif($key2=='key_img_alt'){$htm_key_img_alt=$value;}
						elseif($key2=='key_order'){$htm_key_order=$value;}
						}
						// }
						echo '<tr>';
				
						echo '<td>';
						echo '<a href="/calendar/'.$key_calendar_id.'/'.$htm_key_yyyy.'/'.$htm_key_mm.'/'.$htm_key_order.'" style="text-decoration: none;">';
						echo '<img src="'.$htm_key_img.'" class="img-responsive" alt="" style="background-color:#428bca;">';
						echo '</a>';
						echo '</td>';

						echo '<td style="vertical-align: middle;text-align: center;" >';
						echo '<a href="/calendar/'.$key_calendar_id.'/'.$htm_key_yyyy.'/'.$htm_key_mm.'/'.$htm_key_order.'" style="text-decoration: none;">';
						echo $htm_key_yyyy.'年'.$htm_key_mm.'月'.$htm_key_dd.'日';
						echo '</a>';
						echo '</td>';

						echo '<td style="vertical-align: middle;text-align: center;" >';
						echo '<a href="/calendar/'.$key_calendar_id.'/'.$htm_key_yyyy.'/'.$htm_key_mm.'/'.$htm_key_order.'" style="text-decoration: none;">';
						echo $htm_key_order.'位';
						echo '</a>';
						echo '</td>';

						echo '<td style="vertical-align:middle;text-align: left;" class="hidden-xs">';
						$new_str = str_replace('男性ランキング', '', $htm_key_name);
						$new_str = str_replace('女性ランキング', '', $new_str);
						$new_str = str_replace('ランキング', '', $new_str);
						$new_str = str_replace('ベストセラー', '', $new_str);
						$new_str = str_replace('デイリー', '', $new_str);
						echo '<a href="/calendar/'.$key_calendar_id.'/'.$htm_key_yyyy.'/'.$htm_key_mm.'/'.$htm_key_order.'" style="text-decoration: none;">';
						echo $new_str;
						echo '</a>';
						echo '</td>';

						echo '<td style="vertical-align:middle;text-align: left;" class="hidden-xs">';
						$htm_key_img_alt = mb_strimwidth($htm_key_img_alt, 0, 60, "...");
						echo '<a href="/calendar/'.$key_calendar_id.'/'.$htm_key_yyyy.'/'.$htm_key_mm.'/'.$htm_key_order.'" style="text-decoration: none;">';
						echo $htm_key_img_alt;
						echo '</a>';
						echo '</td>';
						
						echo '</tr>';
					// <!-- 1件目 -->
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!--  -->
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<h2>
				<a href="" class="btn btn-default pull-right" id="page-top">
					<span class="glyphicon glyphicon-arrow-up"></span> To top</a>
			</h2>
		</div>
	</div>

<!--  -->
<!-- ページネーション		 -->
<?php echo $page_link; ?> 
<!-- ページネーション		 -->

	<!-- 広告 -->
    <div class="col-md-12" style="margin-top: 20px;text-align: center;">
      <!-- ＜スポンサーリンク＞ -->
      <?php 
      if($mobile=="SP")
      {
      ?>
		<!-- スマートフォン向けコンテンツ -->
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- ical_sp_btm -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:320px;height:100px"
		     data-ad-client="ca-pub-6625574146245875"
		     data-ad-slot="5295238802"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
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

</div>
	


</div>



