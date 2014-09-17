<?php
foreach ($cal_info as $rowR) {}
foreach ($data as $row) {}
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
	<!-- 一覧 -->
	<div class="row" style="margin-top:20px;">
		<div class="col-md-12" id="listroot">
			<a href="/calendar/<?=$cal_id?>/<?=$yyyy?>/<?=$mm?>" ><?=$rowR->cal_title?></a>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:15px;">
		<h2 style="font-size:20px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;">
			<a href="/daylist/<?=$cal_id?>/<?=$prev?>">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<?=$yyyy?>年<?=$mm?>月<?=$dd?>日
			<a href="/daylist/<?=$cal_id?>/<?=$next?>">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</h2>
	</div>
	<!--  -->

	<hr >

	<div class="row" style="margin-top:5px;">
	<?php
		$exm_group = $rowR->cal_group;
		if($exm_group=='amazon'){
			echo '<a href="'.$rowD->href.'" target="_blank" class="btn btn-primary btn-block">';
			echo 'アマゾンで購入';
			echo '<span class="glyphicon glyphicon-shopping-cart"></span>';
			echo '</a>';
		}elseif($exm_group=='rakuten'){
			echo '<!-- Rakuten Widget FROM HERE -->';
			echo '<script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="036b7509.78adb382.0f0914ee.79e7e208";rakuten_items="ctsmatch";rakuten_genreId=0;rakuten_size="600x200";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="off";rakuten_genre_title="off";rakuten_recommend="on";</script>';
			echo '<script type="text/javascript" src="http://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>';
			echo '<!-- Rakuten Widget TO HERE -->';
		}elseif($exm_group=='iTunes'){
			echo '<a href="'.$rowD->href.'" target="_blank" class="btn btn-primary btn-block">';
			echo 'iTunesで購入';
			echo '<span class="glyphicon glyphicon-shopping-cart"></span>';
			echo '</a>';
		}
	?>


	

		<?php foreach ($dayitem as $rowD):?>
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<div class="thumbnail bootsnipp-thumb">
				<div>
					<p class="lead product-title text-center">
						<a href="#" target="_blank">
							<?php echo $rowD->img_alt;?>
						</a>
					</p>
				</div>
				<a href="#" target="_blank">
					<img class="product-cover" src="<?php echo $rowD->img_path;?>" alt="<?php echo $rowD->img_alt;?>">
				</a>
				<div class="caption">
					<p class="product-description">
						説明</p>
					<p>
					<?php
					$exm_group = $rowR->cal_group;
					if($exm_group=='amazon'){
						echo '<a href="'.$rowD->href.'" target="_blank" class="btn btn-primary btn-block">';
						echo 'アマゾンで購入';
						echo '<span class="glyphicon glyphicon-shopping-cart"></span>';
						echo '</a>';
					}elseif($exm_group=='rakuten'){
						echo '<a href="'.$rowD->href.'" target="_blank" class="btn btn-primary btn-block">';
						echo '楽天市場で購入';
						echo '<span class="glyphicon glyphicon-shopping-cart"></span>';
						echo '</a>';
						
					}elseif($exm_group=='iTunes'){
						echo '<a href="'.$rowD->href.'" target="_blank" class="btn btn-primary btn-block">';
						echo 'iTunesで購入';
						echo '<span class="glyphicon glyphicon-shopping-cart"></span>';
						echo '</a>';
					}
					?>
					</p>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<!--  -->
		<div class="row">
			<div class="col-md-10"></div>
			<div class="col-md-2">
				<h2>
					<a href="" class="btn btn-default pull-right"  id="page-top">
						<span class="glyphicon glyphicon-arrow-up"></span> To top</a>
				</h2>
			</div>
		</div>
	</div>
<!--  -->
</div>
