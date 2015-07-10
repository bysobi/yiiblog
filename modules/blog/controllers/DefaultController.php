<?php

namespace app\modules\blog\controllers;

use yii\web\Controller;
use app\modules\blog\models\Post;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	$models = Post::find()->all();
        return $this->render('index',['models'=>$models]);
    }
}
