<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "sales_by_film_category".
 *
 * @property string $category
 * @property string $total_sales
 */
class SalesByFilmCategory extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_by_film_category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category' => Yii::t('app', 'Category'),
            'total_sales' => Yii::t('app', 'Total Sales'),
        ];
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'last_update',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\SalesByFilmCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\SalesByFilmCategoryQuery(get_called_class());
    }
}
