<?php

$userid = 2;
$calendar_id = 1234;
?>




<a href="javascript: void(0)" >
	<input type="hidden" id="calendar_id" value="<?=$calendar_id?>">
	<input type="hidden" id="userid" value="<?=$userid?>">
	<!-- <span class="starexm glyphicon glyphicon-star" title="お気に入りから削除"></span> -->
	<span class="starexm glyphicon glyphicon-star-empty" title="お気に入りに追加"></span>
	<span style="display: none" class="starexm glyphicon glyphicon-star" title="お気に入りから削除"></span>
</a>






<!-- $(document).ready(function() {
    $(".starexm").click(function(){
        var calendar_id = $("#calendar_id").val();
        var userid = $("#userid").val();
        $.post('/ajax/star_list', {
            calendar_id: calendar_id,
            userid: userid}, function(rs) {
            // var e = 'すばらしい(' + rs + ')';

            var e = rs ;
            $(".startoggle").toggle();
            $('.startoggle').text(e); -->
     
<!-- </head>
 
<body>
<input type="button" id="button" value="Hello" /></form> -->
