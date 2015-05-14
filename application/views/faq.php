<?php
foreach ($calcnt as $row) {}
foreach ($ymdcnt as $rowM) {}
foreach ($daycnt as $rowD) {}

?>
<div class="container  text-muted">
	<!-- パンくず -->
    <ol class="breadcrumb">
        <li><a href="/">ホーム</a></li>
        <li class="active">よくある質問</li>
    </ol>
    <!-- パンくず -->
	<div class="row">
		<div class="col-sm-12" style="margin-top:30px;">


			<h2>よくある質問:</h2>
			<div class="panel-group" id="accordion">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq0">
							登録しているジャンルの数は?
							</a>
						</h3>
					</div>
					<!-- <div id="faq1" class="panel-collapse collapse in"> -->
					<div id="faq0" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
							<li>登録ジャンル数：<?=number_format($row->calcnt)?> 件</li>
							<li>延べ掲載日数：<?=number_format($rowD->daycnt)?> 日</li>
							<li>延べ登録画像数：<?=number_format($rowM->ymdcnt)?> 点</li>
							</ul>
							<?=date('Y-m-d')?> 現在
						</div>
					</div>
				</div>

				<?php foreach ($faq as $item): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq<?=$item->faq_order?>">
							<?=$item->faq_title?>
							</a>
						</h3>
					</div>
					<!-- <div id="faq1" class="panel-collapse collapse in"> -->
					<div id="faq<?=$item->faq_order?>" class="panel-collapse collapse">
						<div class="panel-body">
						<?=$item->faq_faq?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>

		</div>
	</div>
</div>
</div>