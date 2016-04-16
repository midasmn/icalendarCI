<?php
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
		<li><a href="/smart/">インテリカレンダーホーム</a></li>
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
			<h1 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;">インテリカレンダー<?=$exm_title?><small>リスト(<?=number_format($total_cnt)?>件)</small></h1> 
		</div>


	</div>
	<hr id="1">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="col-md-1 fc-head">画像</th>
						<th class="col-md-5 fc-head">タイトル</th>
						<th class="col-md-4  fc-head hidden-xs">詳細</th>
						<!-- <th class="col-md-1  fc-head">URL</th> -->
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($calist as $key1 => $item)
					{
						foreach ($item as $key2 => $value)
						{
					// <!-- 1件目 -->
						if($key2=='cal_img'){$htm_cal_img=$value;}
						elseif($key2=='cal_title'){$htm_cal_title=$value;}
						elseif($key2=='cal_description'){$htm_cal_description=$value;}
						elseif($key2=='cal_id'){$htm_cal_id=$value;}
						}
						// }
						echo '<tr>';
						echo '<td style="text-align: center;vertical-align:middle;">';
						echo '<a href="/calendar/'.$htm_cal_id.'" style="text-decoration: none;">';
						echo '<img src="'.$htm_cal_img.'" class="img-responsive" title="'.$htm_cal_title.'" alt="'.$htm_cal_title.'" style="background-color:#428bca;">';
						echo '</a>';

						echo '</td>';
						echo '<td style="vertical-align:middle;">';
						// $new_str = str_replace('男性ランキング', '', $htm_cal_title);
						// $new_str = str_replace('女性ランキング', '', $new_str);
						// $new_str = str_replace('ランキング', '', $new_str);
						// $new_str = str_replace('ベストセラー', '', $new_str);
						// $new_str = str_replace('デイリー', '', $new_str);
						echo '<a href="/calendar/'.$htm_cal_id.'" style="text-decoration: none;">';
						$new_str = $htm_cal_title;
						echo $new_str;
						echo '</a>';
						echo '</td>';
						echo '<td style="vertical-align: middle;" class="hidden-xs">';
						echo '<a href="/calendar/'.$htm_cal_id.'" style="text-decoration: none;">';
						echo $htm_cal_description;
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

<script>
$(function(){
	$(".listclick").click(function(){
    	window.location=$(this).find("a").attr("href");
    	return false;
    });
});
</script>

