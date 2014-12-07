<?php
foreach ($descriptiondb as $row) {}
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
<div class="container  text-muted">
	<!-- パンくず -->
    <ol class="breadcrumb">
        <li><a href="/">ホーム</a></li>
        <li class="active">利用規約</li>
    </ol>
    <!-- パンくず -->
	<div class="row">
		<div class="col-sm-12"  style="margin-top:30px;">
		<!-- ここからDB -->
			<?=$row->description?>
			<!-- ここまでDB -->
			</div>
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