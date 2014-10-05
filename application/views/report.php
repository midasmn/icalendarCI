
<style>


/*.lib-panel {
    margin-bottom: 20Px;
}
.lib-panel img {
    width: 100%;
    background-color: transparent;
}
.lib-panel .row,
.lib-panel .col-md-6 {
    padding: 0;
    background-color: #FFFFFF;
}
.lib-panel .lib-row {
    padding: 0 20px 0 20px;
}
.lib-panel .lib-row.lib-header {
    background-color: #FFFFFF;
    font-size: 20px;
    padding: 10px 20px 0 20px;
}
.lib-panel .lib-row.lib-header .lib-header-seperator {
    height: 2px;
    width: 26px;
    background-color: #d9d9d9;
    margin: 7px 0 7px 0;
}
.lib-panel .lib-row.lib-desc {
    position: relative;
    height: 100%;
    display: block;
    font-size: 13px;
}
.lib-panel .lib-row.lib-desc a{
    position: absolute;
    width: 100%;
    bottom: 10px;
    left: 20px;
}*/


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
	<div class="row">
		<div class="col-sm-12 col-md-12" style="margin-top:30px;">
			<h2>レポート:</h2>
		</div>

		<!--  -->
		<?php
		$cnt=0;
		foreach ($report as $row) 
		{
		?>
        <div class="col-md-5">
            <div>
                <div class="row">
                    <div class="col-md-6">
                        <img class="thumbnail bootsnipp-thumb img-responsive" src="<?php echo $row->img;?>">
                    </div>
                    <div class="col-md-6">
                        <div>
                        	<h3>
                        		<a href="<?php echo $row->url;?>"><?php echo $row->headline;?></a>
                        	</h3>
                        </div>
                        <div>
                            <?php echo $row->contents;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cnt++;
        	if($n % 2 == 0) {}
			else{
        		echo '<div class="col-md-1"></div>';
    		}
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