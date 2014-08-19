<?php

?>

<!-- ページ -->
	<div class="container">
		<!-- ページヘッダー -->
		<div class="col-xs-12 col-sm-7 col-md-7">
			<h1 style="font-weight:300;text-transform:uppercase;letter-spacing:4px;text-shadow:1px1px 0 rgba(0,0,0,0.1);color:#621;">Flexible Calendar</h1>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5">
			<h2 style="font-weight:300;line-height:30px;text-transform:uppercase;letter-spacing:2px;text-align:right;padding-right:5px;">
				<a href="http://icalendar.xyz">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<span>July</span>
				<span>2014</span>
				<a href="http://icalendar.xyz">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
				<a href="http://icalendar.xyz" title="Go to current date">
					<span class="glyphicon glyphicon-check"></span>
				</a>
			</h2>
		</div>
	</div>
	<!-- ページ -->
	<!--  -->
<style>
.fc-head{
/*	background: rgba(255,100,255,0.2);
	color: rgba(255,100,255,0.9);
	box-shadow: inset 0 1px 0 rgba(255,100,255,0.2);
	border-radius: 20px 20px 0 0;
	height: 20px;
	line-height: 20px;
	padding: 0 20px;
*/
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
	<!-- 			<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Mon</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Tue</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Wed</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Thu</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Fri</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Sat</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">Sun</td> -->
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">月</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">火</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">水</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">木</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">金</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">土</td>
				<td class="col-xs-1 col-sm-1 col-md-1 fc-head">日</td>
		    </tr>
		    <!-- 1 -->
			<tr>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
				<td class="col-xs-1 col-sm-1 col-md-1">
					<a  href="item.php?id=1114433" class="fc-date" data-toggle="popover" data-trigger="click" data-html="true" data-placement="right" data-title="売上第1位" data-content="【XXXX">
					<span>25</span>
					<img src="http://image.moshimo.com/item_image/0143702000341/1/l.jpg" class="img-responsive" alt="第1位" style="background-color:#428bca;">
					</a>
				</td>
			</tr>
			<!-- 1 -->

		    
		</table>
	</div>
	<!--  -->
</div>
