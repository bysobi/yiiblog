<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 0;

    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['status'],'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Статус',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class()); 
    }

}

class CategoryQuery extends ActiveQuery
{
    public function getActive()
    {
        return $this->andWhere(['status' => Category::STATUS_ACTIVE]);
    }

    public function getUnActive()
    {
        return $this->andWhere(['status' => Category::STATUS_UNACTIVE]);
    }

}
