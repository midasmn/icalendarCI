<?php
echo '<a href="javascript: void(0)" class="starexm" data-id='.$calendar_id.'>';
echo '<input type="hidden" id="userid" value="'.$userid.'">';
if($star_flg=="ON")
{
	echo '<span class="startoggle glyphicon glyphicon-star" title="お気に入りから削除"></span>';
	echo '<span  style="display: none"  class="startoggle glyphicon glyphicon-star-empty" title="お気に入りに追加"></span>';
}else{
	echo '<span style="display: none" class="startoggle glyphicon glyphicon-star" title="お気に入りから削除"></span>';
	echo '<span  class="startoggle glyphicon glyphicon-star-empty" title="お気に入りに追加"></span>';
}
echo '</a>';

?>		
<script>
$(document).ready(function() {
	$(".starexm").click(function(){
		var id = $(this).data('id');
		var userid = $("#userid").val();
		$.post('/ajax/star_list', {
    		calendar_id: id,
			userid: userid
			}, function(rs) {
 			$(".startoggle_"+id).toggle();
		});
    });
});
</script>