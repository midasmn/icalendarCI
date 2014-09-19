<?php

$userid = 2;
$calendar_id = 1234;
?>

<!-- <?=$rtn_id?> -->

 <!--ボタン-->
<!--                         <div class="ml_buttons">
                            <input type="hidden" id="itemid" value="<?=$itemid?>">
                            <input type="hidden" id="memberid" value="<?=$memberid?>">
                            <input type="hidden" id="subcategoriesid" value="<?=$subcategories_id?>">
                            <input type="hidden" id="brandid" value="<?=$brand_id?>">
                            <input type="hidden" id="exm" value="<?=$exm?>">
                            <button class="have_sns">持っている<?=$have?></button>
                        </div> -->
                        <!--ボタン-->




<a href="javascript: void(0)">
	<input type="hidden" id="calendar_id" value="<?=$calendar_id?>">
	<input type="hidden" id="userid" value="<?=$userid?>">
	<!-- <span class="starexm glyphicon glyphicon-star" title="お気に入りから削除"></span> -->
	<span class="starexm glyphicon glyphicon-star-empty" title="お気に入りに追加"></span>
	<span style="display: none" class="starexm glyphicon glyphicon-star" title="お気に入りから削除"></span>
</a>