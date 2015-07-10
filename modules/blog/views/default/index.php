<?
use \yii\helpers\Url;
?>

<?php
$this->title = "Blog";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-default-index">
    <h1>Posts</h1>
    <p>
        <ul>
        <?php foreach ($models as $model): ?>
            <li><a href="<?=Url::to(['post/view', 'id' => $model->id])?>">
            <?= $model->title ?></a>
            <?= $model->category->title ?>
            <?= $model->text ?>
            </li>
        <?php endforeach ?>
    </ul>
    </p>
</div>
