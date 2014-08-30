<?php
// cal_img
// cal_id
// cal_title
// cal_tags
// cal_description
if($out){
	echo "<br>OUT".$out."<br>";
	// print_r($out);
}
// calist

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
</style>

 <!-- /////// google広告 -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ical -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6625574146245875"
     data-ad-slot="8541631202"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
 <!-- /////// google広告 -->


<!-- ページ -->
<div class="container">
	<!-- 一覧 -->
	<div class="row" style="margin-top:20px;"  id="listroot">
		<div class="col-md-8">
			<h2 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;"><?=$exm_title?><small>カレンダーリスト</small></h2> 
		</div>
		<!-- 検索窓 -->
		<div class="col-md-4"  style="margin-top:20px;">
			<form role="search" action="search" method="GET" id="search-form">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="キーワード、タグ" name="q" >
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<!-- 検索窓 -->
	</div>
	<!--  -->


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
					<?php foreach ($calist as $row):?>
					<!-- 1件目 -->
					<tr>
						<td style="text-align: center;vertical-align:middle;"><span class="glyphicon glyphicon-star-empty"></span></td>
						<td>
							<img src="<?php echo $row->cal_img;?>" class="img-responsive" alt="第1位" style="background-color:#428bca;">
						</td>
						<td style="vertical-align:middle;"><?php echo $row->cal_title;?></td>
						<td style="vertical-align: middle;" class="hidden-xs">
						<?php echo $row->cal_description;?>
						</td>
						<!-- <td style="vertical-align: middle;" class="hidden-xs"><?php echo $row->cal_tags;?></td> -->
						<td style="vertical-align:middle;">
							<a class="btn btn-block btn-info" href="/calendar/<?php echo $row->cal_id;?>">開く</a>
						</td>
					</tr>
					<!-- 1件目 -->
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
	<!--  -->
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<h2>
				<a href="#listroot" class="btn btn-default pull-right"><span class="glyphicon glyphicon-arrow-up"></span> To top</a>
			</h2>
		</div>
	</div>
</div>
<!--  -->
<!-- ページネーション		 -->
<?php echo $page_link; ?> 
<!-- ページネーション		 -->
</div>
