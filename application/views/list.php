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

	<!-- 広告 -->
<!-- 	<div class="row" style="margin-top:10px;" >
		<div class="col-xs-12 col-sm-12 col-md-12">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
		<!-- レスポンシブ -->
<!-- 		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-6625574146245875"
		     data-ad-slot="6145590005"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		</div>
	</div> -->
	<!-- 広告 -->
	<!-- パンくず -->
	<ol class="breadcrumb">
		<li><a href="/smart/">ホーム</a></li>
		<li class="active"><?=$exm_title?></li>
	</ol>
	<!-- パンくず -->
	<!-- 一覧 -->
	<div class="row" style="margin-top:20px;"  id="listroot">
		<div class="col-md-8">
			<h2 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;"><?=$exm_title?><small>カレンダーリスト(<?=number_format($total_cnt)?>件)</small></h2> 
		</div>
		<!-- 検索窓 -->
		<div class="col-md-4"  style="margin-top:20px;">
		<?php
		$hidden = array('exm' => $exm);
		echo form_open("/search/",'',$hidden);	//フォームを開く

		echo '<div class="input-group">';
		$search_st = 'class="form-control" placeholder="キーワード (スペース区切り)" type="text"';
		$keyword = $this->input->post('keyword');
		if(!$keyword){$keyword=$flash_keyword;}
		echo form_input('keyword', $keyword,$search_st);	//Emailの入力フィールドを出力	
		echo '<div class="input-group-btn">';
		echo '<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>';
		echo '</div>';
		echo '</div>';
		echo form_close();	//フォームを閉じる
		?>
		</div>
		<!-- 検索窓 -->

	</div>
	<hr id="1">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="col-md-1 fc-head"><span class="glyphicon glyphicon-star"></span></th>
						<th class="col-md-1 fc-head">画像</th>
						<th class="col-md-5 fc-head">タイトル</th>
						<th class="col-md-4  fc-head hidden-xs">詳細</th>
						<th class="col-md-1  fc-head">URL</th>
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
						if($userid>0)
						{
							//ログイン中
							echo '<a href="javascript: void(0)" class="starlist" data-id="'.$htm_cal_id.'">';
							echo '<input type="hidden" id="calendar_id" value="'.$htm_cal_id.'">';
							echo '<input type="hidden" id="userid" value="'.$userid.'">';
							//
							$st_flg = "OFF";
							foreach($star as $data) 	//スター配列と比較
							{
								if ($data['itemid'] == $htm_cal_id) {$st_flg = "ON";}
							}
							if($st_flg=="ON")
							{
								echo '<span  class="startoggle_'.$htm_cal_id.' glyphicon glyphicon-star" title="お気に入りから削除"></span>';
								echo '<span  style="display: none"  class="startoggle_'.$htm_cal_id.' glyphicon glyphicon-star-empty" title="お気に入りに追加"></span>';
							}else{
								echo '<span  style="display: none" class="startoggle_'.$htm_cal_id.' glyphicon glyphicon-star" title="お気に入りから削除"></span>';
								echo '<span  class="startoggle_'.$htm_cal_id.' glyphicon glyphicon-star-empty" title="お気に入りに追加"></span>';
							}
							echo '</a>';
						}else{
							echo '<span  class="startoggle glyphicon glyphicon-star-empty" title="ログインしてお気に入りに追加"></span>';
						}
						//
						
						//

						echo '</td>';
						echo '<td>';
						echo '<img src="'.$htm_cal_img.'" class="img-responsive" alt="" style="background-color:#428bca;">';
						echo '</td>';
						echo '<td style="vertical-align:middle;">';
						$new_str = str_replace('男性ランキング', '', $htm_cal_title);
						$new_str = str_replace('女性ランキング', '', $new_str);
						$new_str = str_replace('ランキング', '', $new_str);
						$new_str = str_replace('ベストセラー', '', $new_str);
						$new_str = str_replace('デイリー', '', $new_str);
						echo $new_str;
						echo '</td>';
						echo '<td style="vertical-align: middle;" class="hidden-xs">';
						echo $htm_cal_description;
						echo '</td>';
						echo '<td style="vertical-align:middle;">';
						echo '<a class="btn btn-block btn-info" href="/calendar/'.$htm_cal_id.'">開く</a>';
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
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- レスポンシブ -->
	<ins class="adsbygoogle"
	     style="display:block"
	     data-ad-client="ca-pub-6625574146245875"
	     data-ad-slot="6145590005"
	     data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<!-- 広告 -->

</div>
	


</div>
