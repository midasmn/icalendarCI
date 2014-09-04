<div class="container">
	<div class="row">
		<div class="col-sm-12">


			<h2>よくある質問:</h2>
			<div class="panel-group" id="accordion">

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