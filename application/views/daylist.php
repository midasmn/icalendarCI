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
</style>
<!-- ページ -->
<div class="container">
	<!-- 一覧 -->
	<div class="row" style="margin-top:20px;">

		<div class="col-md-12" >
			<a href="/daylist/<?=$cal_id?>/<?=$prev?>">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a href="/daylist/<?=$cal_id?>/<?=$next?>">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>

	<div class="row" style="margin-top:20px;">
		<div class="col-md-10">
			<h2><?=$yyyy?>年<?=$mm?>月<?=$dd?>日<small><a href="/calendar/<?=$cal_id?>/<?=$yyyy?>/<?=$mm?>" ><?=$rowR->cal_title?></a></small></h2> 
		</div>
	</div>
	<!--  -->
	<hr >
	<div class="row" style="margin-top:5px;">

		<?php foreach ($dayitem as $rowD):?>
		<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			<div class="thumbnail bootsnipp-thumb">
				<div>
					<p class="lead product-title text-center">
						<a href="#" target="_blank">
							<?php echo $rowD->img_alt;?>
						</a>
					</p>
				</div>
				<a href="https://creativemarket.com/bootstrap-carnival/47298-Elemental-Minimal-Elegant-Theme?u=msurguy" target="_blank">
					<img class="product-cover" src="<?php echo $rowD->img_path;?>" alt="<?php echo $rowD->img_alt;?>">
				</a>
				<div class="caption">
					<p class="product-description">
						Elemental is a clean, elegant  and comes in three variations.</p>
					<p>
						<a href="#" target="_blank" class="btn btn-primary btn-block">
							View and Buy 
							<span class="glyphicon glyphicon-shopping-cart"></span>
						</a>
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
					<a href="#listroot" class="btn btn-default pull-right"><span class="glyphicon glyphicon-arrow-up"></span> To top</a>
				</h2>
			</div>
		</div>
	</div>
<!--  -->
</div>
