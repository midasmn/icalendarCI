<?php

$lastday =  date('Y/m/d', strtotime('-1 day'));
// $lastmonth =  date('Y/m', strtotime('-1 day'));
$lastmonth =  date('Y/m', strtotime('-1 month'));

// 
// $timestamp =  strtotime( "-1 day" );//昨日
$calid = 343; //yahoo検索人物総数デイリー
// $calurl = '/calendar/343/'.date('Y').'/'.date('m');
$calurl = '/calendar/343/'.$lastmonth;
$dayurl = '/daylist/5470/'.$lastday;
?>
<!-- SNSボタン -->
<link href="<?=base_url('/application/views/assets/css/normalize.min.css')?>" rel="stylesheet">
<link href="<?=base_url('/application/views/assets/css/rrssb.css')?>" rel="stylesheet">
<!-- SNSボタン -->
    
<div class="container">
    <!-- パスワード忘れ -->
    <div class="row">
        <!-- <div class="col-md-4 col-md-offset-4"> -->
        <div class="col-sm-12 col-md-12" style="margin-top:30px;">    
            <h1 class="text-center">iCalendarへようこそ</h1>
        </div>
    </div>

   <div class="row">
        <div class="col-sm-12  col-md-12">
            <h2 class="text-muted text-center">画像カレンダーでその日の出来事が一瞬でわかります。</h2>
        </div>
    </div>
     <div class="row" style="margin-top:30px;">
        <div class="thumbnail bootsnipp-thumb">
            <img src="<?=base_url('/application/img/main_mini.jpg')?>"  class="img-responsive text-center" alt="iCalendarへようこそ-あの日の最も人気のあった画像を記録します。" />
        </div>
    </div>


    <div class="row" style="margin-top:50px;">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail bootsnipp-thumb">
                <img class="text-center" src="<?=base_url('/application/img/callist_mini.jpg')?>"  alt="" />
        
            <h4>600種のカレンダーからえらべる:</h4>
                <p>アマゾンベストセラー、楽天ランキング、オリコンランキング、iTunesランキングな多彩なジャンルの人気画像を記録しています。<br />
                    <!-- <span class="glyphicon glyphicon-hand-right"> -->
                        <a href="/smart/" class="link-block">カレンダー一覧をみる</a>
                    <!-- </span> -->
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail bootsnipp-thumb">
                <img class="text-center" src="<?=base_url('/application/img/aircal_mini.jpg')?>"  alt="" />
            <h4>月の出来事がひと目でわかる:</h4>
                <p>カレンダー形式で日付ごとの人気画像がひと目でわかるので、売れ筋商品の確認や曖昧になってしまった記憶も一瞬で蘇ります。<br />
                    <!-- <span class="glyphicon glyphicon-hand-right"> -->
                        <a href="<?=$calurl?>" class="link-block"><?=$lastmonth?>のカレンダーをみる</a>
                    <!-- </span> -->
                </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="thumbnail bootsnipp-thumb">
                <img class="text-center"  src="<?=base_url('/application/img/daylist_mini.jpg')?>" alt="" />
            <h4>その日の人気画像一覧がみれる:</h4>
                <p>日付の画像をクリックするとその日の人気画像一覧もみれます。(商品のカレンダーの場合は購入ボタンですぐ買い物ができます)<br />
                    <!-- <span class="glyphicon glyphicon-hand-right"> -->
                        <a href="<?=$dayurl?>" class="link-block"><?=$lastday?>の画像を一覧をみる</a>
                    <!-- </span> -->
                </p>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12" >
            <!-- <div class="share-container clearfix"> -->
            <!-- Buttons start here. Copy this ul to your document. -->
            <ul class="rrssb-buttons clearfix">
                <li class="facebook">
                    <!-- Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
                    https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
                    <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=http://kurtnoble.com/labs/rrssb/index.html" class="popup"> -->
                    <a href="http://www.facebook.com/sharer.php?u=<?=current_url();?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                        <span class="icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                <path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
                                    c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
                                    c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
                            </svg>
                        </span>
                        <span class="text">シェア</span>
                    </a>
                </li>
                <li class="googleplus">
                    <!-- Replace href with your meta and URL information.  -->
                    <!-- <a href="https://plus.google.com/share?url=Check%20out%20how%20ridiculously%20responsive%20these%20social%20buttons%20are%20http://kurtnoble.com/labs/rrssb/index.html" class="popup"> -->
                    <a href="https://plus.google.com/share?url=<?=current_url();?>" onclick="_gaq.push(['_trackEvent','Share', '<?=$og_title?>', 'Google Plus']);window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');return false;">

                        <span class="icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M14.703,15.854l-1.219-0.948c-0.372-0.308-0.88-0.715-0.88-1.459c0-0.748,0.508-1.223,0.95-1.663
                                            c1.42-1.119,2.839-2.309,2.839-4.817c0-2.58-1.621-3.937-2.399-4.581h2.097l2.202-1.383h-6.67c-1.83,0-4.467,0.433-6.398,2.027
                                            C3.768,4.287,3.059,6.018,3.059,7.576c0,2.634,2.022,5.328,5.604,5.328c0.339,0,0.71-0.033,1.083-0.068
                                            c-0.167,0.408-0.336,0.748-0.336,1.324c0,1.04,0.551,1.685,1.011,2.297c-1.524,0.104-4.37,0.273-6.467,1.562
                                            c-1.998,1.188-2.605,2.916-2.605,4.137c0,2.512,2.358,4.84,7.289,4.84c5.822,0,8.904-3.223,8.904-6.41
                                            c0.008-2.327-1.359-3.489-2.829-4.731H14.703z M10.269,11.951c-2.912,0-4.231-3.765-4.231-6.037c0-0.884,0.168-1.797,0.744-2.511
                                            c0.543-0.679,1.489-1.12,2.372-1.12c2.807,0,4.256,3.798,4.256,6.242c0,0.612-0.067,1.694-0.845,2.478
                                            c-0.537,0.55-1.438,0.948-2.295,0.951V11.951z M10.302,25.609c-3.621,0-5.957-1.732-5.957-4.142c0-2.408,2.165-3.223,2.911-3.492
                                            c1.421-0.479,3.25-0.545,3.555-0.545c0.338,0,0.52,0,0.766,0.034c2.574,1.838,3.706,2.757,3.706,4.479
                                            c-0.002,2.073-1.736,3.665-4.982,3.649L10.302,25.609z"/>
                                        <polygon points="23.254,11.89 23.254,8.521 21.569,8.521 21.569,11.89 18.202,11.89 18.202,13.604 21.569,13.604 21.569,17.004
                                            23.254,17.004 23.254,13.604 26.653,13.604 26.653,11.89      "/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="text">シェア</span>
                    </a>
                </li>
                <li class="twitter">
                    <!-- Replace href with your Meta and URL information  -->
                    <!-- <a href="http://twitter.com/home?status=Ridiculously%20Responsive%20Social%20Sharing%20Buttons%20by%20@joshuatuscan%20and%20@dbox%20http://kurtnoble.com/labs/rrssb" class="popup"> -->
                    <a href="http://twitter.com/share?url=<?=current_url();?>&amp;text=<?=$og_title?>&amp;via=icalendar_xyz" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                        <span class="icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                            <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                                c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                                C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                                C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                                c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                                C26.275,7.229,25.39,8.196,24.253,8.756z"/>
                            </svg>
                       </span>
                        <span class="text">ツィート</span>
                    </a>
                </li>
                <li class="pinterest">
                    <!-- Replace href with your meta and URL information.  -->
                    <a href="http://pinterest.com/pin/create/button/?url=<?=current_url();?>&amp;media=<?=$og_image?>&amp;description=<?=$og_title?>%20%20iCalendar.xyz.">
                        <span class="icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                            <path d="M14.021,1.57C6.96,1.57,1.236,7.293,1.236,14.355c0,7.062,5.724,12.785,12.785,12.785c7.061,0,12.785-5.725,12.785-12.785
                                C26.807,7.294,21.082,1.57,14.021,1.57z M15.261,18.655c-1.161-0.09-1.649-0.666-2.559-1.219c-0.501,2.626-1.113,5.145-2.925,6.458
                                c-0.559-3.971,0.822-6.951,1.462-10.116c-1.093-1.84,0.132-5.545,2.438-4.632c2.837,1.123-2.458,6.842,1.099,7.557
                                c3.711,0.744,5.227-6.439,2.925-8.775c-3.325-3.374-9.678-0.077-8.897,4.754c0.19,1.178,1.408,1.538,0.489,3.168
                                C7.165,15.378,6.53,13.7,6.611,11.462c0.131-3.662,3.291-6.227,6.46-6.582c4.007-0.448,7.771,1.474,8.29,5.239
                                c0.579,4.255-1.816,8.865-6.102,8.533L15.261,18.655z"/>
                            </svg>
                        </span>
                        <span class="text">ピンする</span>
                    </a>
                </li>
                <li class="tumblr">
                    <a href="http://www.tumblr.com/share/?v=3&amp;u=<?=urlencode(current_url())?>&amp;t=<?=urlencode($og_title)?>&amp;s=<?=urlencode($og_description)?>">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve"><path d="M18.02 21.842c-2.029 0.052-2.422-1.396-2.439-2.446v-7.294h4.729V7.874h-4.71V1.592c0 0-3.653 0-3.714 0 s-0.167 0.053-0.182 0.186c-0.218 1.935-1.144 5.33-4.988 6.688v3.637h2.927v7.677c0 2.8 1.7 6.7 7.3 6.6 c1.863-0.03 3.934-0.795 4.392-1.453l-1.22-3.539C19.595 21.6 18.7 21.8 18 21.842z"/></svg>
                        </span>
                        <span class="text">シェア</span>
                    </a>
                </li>
                <li class="pocket">
                    <!-- <a href="https://getpocket.com/save?url=http://kurtnoble.com/labs/rrssb/index.html"> -->
                    <a href="http://getpocket.com/edit?url=<?=current_url();?>&amp;title=<?=$og_title?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                        <span class="icon">
                            <svg width="32px" height="28px" viewBox="0 0 32 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                <path d="M28.7817528,0.00172488695 C30.8117487,0.00431221738 31.9749312,1.12074529 31.9644402,3.10781507 C31.942147,6.67703739 32.1336065,10.2669583 31.8057648,13.8090137 C30.7147076,25.5813672 17.2181194,31.8996281 7.20714461,25.3808491 C2.71833574,22.4571656 0.196577202,18.3122624 0.0549495772,12.9357897 C-0.0342233715,9.5774348 0.00642900214,6.21519891 0.0300336062,2.85555035 C0.0405245414,1.1129833 1.21157517,0.0146615391 3.01995012,0.00819321302 C7.34746087,-0.00603710433 11.6775944,0.00431221738 16.0064164,0.00172488695 C20.2644248,0.00172488695 24.5237444,-0.00215610869 28.7817528,0.00172488695 L28.7817528,0.00172488695 Z M8.64885184,7.85611511 C7.38773662,7.99113854 6.66148108,8.42606978 6.29310958,9.33228474 C5.90114134,10.2969233 6.17774769,11.1421181 6.89875951,11.8276216 C9.35282156,14.161969 11.8108164,16.4924215 14.2976518,18.7943114 C15.3844131,19.7966007 16.5354102,19.7836177 17.6116843,18.7813283 C20.0185529,16.5495467 22.4070683,14.2982907 24.7824746,12.0327533 C25.9845979,10.8850542 26.1012707,9.56468083 25.1469132,8.60653379 C24.1361858,7.59255976 22.8449191,7.6743528 21.5890476,8.85191291 C19.9936451,10.3488554 18.3680912,11.8172352 16.8395462,13.3777945 C16.1342655,14.093159 15.7200114,14.0048744 15.0566806,13.3440386 C13.4599671,11.7484252 11.8081945,10.2060421 10.1262706,8.70001155 C9.65564653,8.27936164 9.00411403,8.05345704 8.64885184,7.85611511 L8.64885184,7.85611511 L8.64885184,7.85611511 Z"></path>
                            </svg>
                        </span>
                        <span class="text">あとで見る</span>
                    </a>
                </li>
            </ul>
            <!-- Buttons end here -->
        </div>
        <!-- SNS -->
    </div>
</div>