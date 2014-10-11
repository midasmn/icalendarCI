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
	<!-- 一覧 -->
	<div class="row" style="margin-top:20px;"  id="listroot">
		<div class="col-md-8">
			<h2 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;">
				<?=$exm_title?><small>(<?=number_format($total_cnt)?>件)</small>
			</h2> 
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
	<!--  -->
	<hr id="1">

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
		<p><h2><a href="#cat-5">Yahoo!検索デイリー</a></h2></p>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3">
		<p><h2><a href="#cat-6">Google画像検索</a></h2></p>
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
		if($old_st==$new_st){
		}else{
			$old_st = $new_st;
			switch ($new_st) {
				case 'rakuten':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h3 id="cat-2">楽天市場ランキング</h3></p>';
					echo '</div>';
					break;
				case 'amazon':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h3 id="cat-1">アマゾンベストセラー</h3></p>';
					echo '</div>';
					break;
				case 'oricon':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h3 id="cat-4">オリコンランキング</h3></p>';
					echo '</div>';
					break;
				case 'iTunes':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h3 id="cat-3">iTunesランキング</h3></p>';
					echo '</div>';
					break;
				case 'google':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h3  id="cat-6">Google画像検索</h3></p>';
					echo '</div>';
					break;
				case 'yahoo':
					echo '<div class="col-xs-12 col-sm-12 col-md-12"></div>';
					echo '<div class="col-xs-12 col-sm-12 col-md-12">';
					echo '<p><h3  id="cat-5">Yahoo!検索デイリー</h3></p>';
					echo '</div>';
					break;
				default:
					# code...
					break;
			}
		}
		echo '<div class="col-xs-12 col-sm-6 col-md-4">';
		$st = $rowR->cal_title;
		$new_str = str_replace('男性ランキング', '', $st);
		$new_str = str_replace('女性ランキング', '', $new_str);
		$new_str = str_replace('ランキング', '', $new_str);
		$new_str = str_replace('ベストセラー', '', $new_str);
		$new_str = str_replace('デイリー', '', $new_str);
		// echo '<a href="/calendar/'.$rowR->cal_id.'">'.$rowR->cal_title.'</a>';
		echo '<a href="/calendar/'.$rowR->cal_id.'">'.$new_str.'</a>';
		echo '</div>';
		$cnt++;			
	}
	?>
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
</div>
<!--  -->
</div>

