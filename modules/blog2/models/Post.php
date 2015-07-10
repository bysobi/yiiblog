<?php

namespace app\modules\blog2\models;

use app\modules\admin\models\Category;
use Yii;
use yii\web\UploadedFile;

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
    public $image;   
    public $string;
    public $filename;
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
            [['text', 'description','date_create'], 'string'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['img'], 'file'],
            
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
            'img' => 'Изображение',
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

    public function beforeSave($insert){
        if($this->isNewRecord){
            $this->string = substr(uniqid('img'), 0, 12);
            $this->image = UploadedFile::getInstance($this,'img');
            $this->filename = 'static/images/' . $this->string . '.' . $this->image->extension;
            $this->image->saveAs($this->filename);
            $this->img = '/' . $this->filename;
        }
        else{
            $this->image = UploadedFile::getInstance($this,'images');
            if($this->img){
                $this->img->saveAs(substr($this->img, 1));
            }
        }

        return parent::beforeSave($insert);

    }

}
