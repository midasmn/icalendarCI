<?php

?>

<!-- <?=$rtn_id?> -->

<!-- <div class="ml_buttons"> -->
<!--     <input type="hidden" id="calendar_id" value="<?=$calendar_id?>">
    <input type="hidden" id="userid" value="<?=$userid?>">
	<span id="starexm" class="glyphicon glyphicon-star"></span>
	<span id="starexm" class="star_btn glyphicon glyphicon-star-empty"></span>
</div> -->
<!--ボタン-->


<button>Toggle</button>
<p>Hello</p>
<p style="display: none">Good Bye</p>



<script>
// $(document).ready(function() {
// 	$(".star_btn").click(function(){
//         var exm = 'calendar';
// 		var calendar_id = $("#calendar_id").val();
// 		var userid = $("#userid").val();
// 		$.post('/ajax/star_list', {
//     		calendar_id: calendar_id,
// 			userid: userid,
// 			exm: exm}, function(rs) {
//  			var e = '持っている(' + rs + ')';
//        		$('.have_sns').text(e);
// 		});
//     });

// });


$("button").click(function () {
  $("p").toggle();
});
</script>