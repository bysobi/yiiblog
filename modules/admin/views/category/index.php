<?php

use yii\helpers\Html;
use yii\grid\GridView;

//use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = ['label' => 'Admin menu', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            if($model->category_status == 'inactive'){
                return['class' => 'danger'];
            } else if($model->category_status == 'active'){
                return['class' => 'success'];
            }
        },
        'layout' => '<div class="GridViewSummary">{summary}</div><div class="panel panel-default"><div class="table-responsive">{items}</div><div class="table-footer">{pager}</div></div>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['style'=>'text-align:center'],
            ],
            'id',
            'title',
            [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'category_status',
            'header'=>'Status',
            'filter' => ([$model->category_status.active =>'Active',$model->category_status.inactive =>'Inactive']),
            'contentOptions' => ['style'=>'text-align:center'],
            'headerOptions' => ['width' => '100','style'=>'text-align:center'],
            'value' => 'category_status',
            ],
            [
            'class' => 'yii\grid\CheckboxColumn',
            // you may configure additional properties here
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Setting',
            'headerOptions' => ['width' => '70'],
            'template' => '{view} {update} {delete}',
            ], 
       
        ],
    ]); ?>


</div>
