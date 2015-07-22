<?php
use \yii\helpers\Url;
?>
  <ul class="pager">

	<?php foreach($modelsPrev as $model): ?>
		<li class="previous"><a href="<?=Url::to(['view', 'id' => $model->id])?>" title="<?= $model->title ?> =>"><span aria-hidden="true">&larr;</span> <?= $model->title ?></a></li>
	<?php endforeach ?>

	<?php foreach($modelsNext as $model): ?>
		<li class="next"><a href="<?=Url::to(['view', 'id' => $model->id])?>" title="<?= $model->title ?> =>"><?= $model->title ?> <span aria-hidden="true">&rarr;</span></a></li>
	<?php endforeach ?>     
 
  </ul>
</nav>