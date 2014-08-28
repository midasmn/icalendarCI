<?php
foreach ($cal_info as $rowR) {}
?>

</style>
	<!-- ページ -->
	<div class="container">
		<!-- ページヘッダー -->
		<div class="row" style="margin-top:20px;">
			<div class="col-xs-6 col-sm-4 col-md-2" >
				<?php 
				if(!$pr_cal){
				}else{
					echo '<a href="/calendar/'.$pr_cal.'">前のカレンダー</a>';
				}
				?>
			</div>
			<div class="col-sm-4 col-md-8" ></div>
			<div class="col-xs-6 col-sm-4 col-md-2 text-right" >
				<?php
				if(!$nex_cal){}else{
					echo '<a href="/calendar/'.$nex_cal.'">次のカレンダー</a>';
			 	}?>
			</div>
		</div>

		<div class="col-xs-12 col-sm-7 col-md-7">
			<h1 style="font-size:28px;font-weight:200;1px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;"><span class="glyphicon glyphicon-star-empty"></span><?=$rowR->cal_title?></h1>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5">
			<h2 style="font-size:19px;font-weight:200;line-height:15px;text-transform:uppercase;letter-spacing:1px;text-align:right;padding-right:2px;">
				<a href="/calendar/<?=$cal_id?>/<?=$prev?>">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<span><?=$mm_st?></span>
				<span><?=$yyyy?></span>
				<a href="/calendar/<?=$cal_id?>/<?=$next?>">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
				<!-- <a href="/calendar/<?=$cal_id?>/<?=date('Y')?>/<?=date('n')?>" title="Go to current date"> -->
				<a href="/calendar/<?=$cal_id?>/<?php echo str_replace("-", "/",date("Y-m"));?>" title="今月へ">
				
					<span class="glyphicon glyphicon-check"></span>
				</a>
			</h2>
		</div>
	</div>
	<!-- ページ -->
	<!--  -->
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
.fc-date span{
	position: absolute;
	z-index: 9;
	color: rgba(255,255,255,0.9);
	text-shadow: none;
	font-size: 26px;
	font-weight: 300;
	bottom: auto;
	right: auto;t
	op: 3px;
	left: 6px;
	text-align: left;
	text-shadow: 0 1px 1px rgba(0,0,0,0.3);
}
</style>

	<div class="container">
	 	<table class="table table-condensed">
		    <!-- <tr class="fc-head"> -->
		    <tr>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">日</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">月</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">火</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">水</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">木</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">金</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">土</td>
		    </tr>
		    <!-- カレンダーメイン -->
			<?php 
			foreach($cal_tbl as $week){echo $week;}
			?>
			<!-- カレンダーメイン -->
		</table>
	</div>
	<!--  -->
</div>
