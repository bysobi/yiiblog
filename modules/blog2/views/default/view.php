<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['/blog2']];
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $model->title ?></div>
        <div class="panel-body">
            <?= ($model->img) ? Html::img($model->img, ['class'=>'img-thumbnail', 'alt'=> $model->title]) : ''  ?>
            <?= $model->text ?>
            <div class="alert alert-warning" role="alert"><?= $model->date_create ?></div>
        </div>
    </div>

</div>
