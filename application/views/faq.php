<?php
foreach ($calcnt as $row) {}
foreach ($ymdcnt as $rowM) {}
foreach ($daycnt as $rowD) {}
?>
<div class="container  text-muted">
	<div class="row">
		<div class="col-sm-12">


			<h3>よくある質問:</h3>
			<div class="panel-group" id="accordion">

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq0">
							登録しているカレンダーの数
							</a>
						</h4>
					</div>
					<!-- <div id="faq1" class="panel-collapse collapse in"> -->
					<div id="faq0" class="panel-collapse collapse">
						<div class="panel-body">
						<?=date('Y-m-d')?> 現在<br>
						登録カレンダー数：<?=number_format($row->calcnt)?> 件<br>
						カレンダー掲載日数：<?=number_format($rowD->daycnt)?> 日<br>
						カレンダー登録画像数：<?=number_format($rowM->ymdcnt)?> 点
						</div>
					</div>
				</div>

				<?php foreach ($faq as $item): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq<?=$item->faq_order?>">
							<?=$item->faq_title?>
							</a>
						</h4>
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