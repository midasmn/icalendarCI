<?php

$lastday =  date('Y/m/d', strtotime('-1 day'));
$lastmonth =  date('Y/m', strtotime('-1 day'));
// 
// $timestamp =  strtotime( "-1 day" );//昨日
$calid = 343; //yahoo検索人物総数デイリー
// $calurl = '/calendar/343/'.date('Y').'/'.date('m');
$calurl = '/calendar/343/'.$lastmonth;
$dayurl = '/daylist/343/'.$lastday;
?>
<div class="container">
	<!-- パスワード忘れ -->
	<div class="row">
		<!-- <div class="col-md-4 col-md-offset-4"> -->
		<div class="col-sm-12 col-md-12" style="margin-top:30px;">
			<h1 class="text-center">iCalendarにようこそ</h1>
		</div>
	</div>

   <div class="row">
		<div class="col-sm-12  col-md-12">
            <h3 class="text-muted text-center">あの日の最も人気のあった画像を記録します。</h3>
        </div>
    </div>
     <div class="row" style="margin-top:30px;">
     	<div class="thumbnail bootsnipp-thumb">
            <img src="https://www.apple.com/jp/itunes/working-itunes/images/working-hero.jpg"  class="img-responsive text-center" alt="iCalendarへようこそ-あの日の最も人気のあった画像を記録します。" />
        </div>
    </div>


    <div class="row" style="margin-top:50px;">
        <div class="col-sm-4">
        	<div class="thumbnail bootsnipp-thumb">
            	<img class="text-center" src="https://www.apple.com/jp/itunes/working-itunes/images/working-sell-hardware.jpg" width="160" height="166" alt="" />
            
            <h4>いろいろなジャンルのランキング:</h4>
            	<p>アマゾンベストセラー、楽天ランキング、オリコンランキング、iTunesランキングなど600を超える多彩なジャンルの画像を記録したカレンダーからトップセールス商品やジャンルを独占する隠れた名品などがわかります。<br />
   					<span class="more"><a href="/smart/" class="link-block">カレンダー一覧をみる</a></span>
   				</p>
   			</div>
        </div>
        <div class="col-sm-4">
        	<div class="thumbnail bootsnipp-thumb">
            	<img class="text-center" src="https://www.apple.com/jp/itunes/working-itunes/images/working-create-hardware.jpg" width="200" height="166" alt="" />
            <h4>カレンダーで人気画像がひと目でわかる:</h4>
            	<p>インターネット上の膨大な情報からいろいろなジャンルで最も人気があった画像を毎日カレンダー形式で記録しているので、記憶が曖昧でもひと目でその月の出来事が鮮明に蘇ります。<br />
   					<span class="more"><a href="<?=$calurl?>" class="link-block"><?=$lastmonth?>のカレンダーをみる</a></span>
   				</p>
   			</div>
        </div>
        <div class="col-sm-4">
        	<div class="thumbnail bootsnipp-thumb">
            	<img class="text-center"  src="https://www.apple.com/jp/itunes/working-itunes/images/working-market-hardware.jpg" width="220" height="166" alt="" />
            <h4>その日の2位以下の画像もみれる:</h4>
            	<p>カレンダー形式は1日1画像ですが、日付をクリックすると2位以下の画像もみれます。<br>(商品の売上げランキング等の場合は購入リンク付きなのですぐ買い物ができます)<br />
   					<span class="more"><a href="<?=$dayurl?>" class="link-block"><?=$lastday?>の画像を一覧をみる</a></span>
   				</p>
   			</div>
        </div>
    </div>
