<?php

namespace app\modules\blog\models;
use app\modules\admin\models\Category;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $description
 * @property integer $category_id
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'category_id'], 'required'],
            [['text', 'description', 'url_img','date_create'], 'string'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'text' => 'Текст',
            'url_img' => 'Изображение',
            'description' => 'Краткое описание',
            'category_id' => 'Категория',
            'category.title' => 'Категория',
            'date_create' => 'Дата создания',
        ];
    }

    public function getCategory() 
    {
       return $this->hasOne (Category::className(),['id'=>'category_id']);
    }

}
