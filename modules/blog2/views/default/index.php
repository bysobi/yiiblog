<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\blog\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


<div class="row">
<?php foreach ($posts as $item): ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://s3.dotua.org/fsua_items/cover/00/38/48/2/00384801.jpg" alt="<?= $item->title ?>">
      <div class="caption">
        <h3><a style="text-align:center;!important" href="<?=Url::to(['view', 'id' => $item->id])?>"><?= $item->title ?></a></h3>
        <p><?= $item->description ?></p>
        <p><a href="<?=Url::to(['view', 'id' => $item->id])?>" class="btn btn-primary" role="button">Read</a><div class="alert alert-warning" role="alert"><?= $item->date_create ?></div></p>
        <p><?= $item->category->title ?></p>
      </div>
    </div>
  </div>
<?php endforeach ?>
</div>
</div>
