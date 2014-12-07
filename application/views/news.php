
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
<div class="container text-muted">
	<!-- パンくず -->
    <ol class="breadcrumb">
        <li><a href="/">ホーム</a></li>
        <li class="active">ニュース</li>
    </ol>
    <!-- パンくず -->
	<div class="row">
		<div class="col-sm-12 col-md-12" style="margin-top:30px;">
			<h2>最新情報:</h2>	
		</div>

		<?php
		foreach ($news as $row) 
		{
			echo '<div class="col-md-12">';
			echo '<h4>';
			echo '<div class="col-md-2">';
			echo $row->date;
			echo '</div>';
			echo '<div class="col-md-8">';
			echo '<a href="'.$row->url.'">'.$row->headline.'</a>';
			echo '</div>';
			echo '<div class="col-md-2">';
			echo '</div>';
			echo '</h4>';
			echo '</div>';
		}
		?>


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
	
</div>