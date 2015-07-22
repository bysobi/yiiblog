<?php 

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\modules\blog2\models\Post;

class PaginationPrevNext extends Widget
{
    public $timec =0;
    function run()
    {
        $modelsPrev = Post::find()
            ->where(['>', 'created_at', $this->timec])
            ->select(['id', 'title'])
            ->limit(1)
            ->orderBy('created_at')
            ->all();

         $modelsNext = Post::find()
            ->where(['<', 'created_at', $this->timec])
            ->select(['id', 'title'])
            ->limit(1)
            ->orderBy('created_at DESC')
            ->all();

        return $this->render('PaginationPrevNext', compact('modelsPrev','modelsNext'));
    }
}

?>