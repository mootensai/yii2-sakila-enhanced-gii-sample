<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "sales_by_store".
 *
 * @property string $store
 * @property string $manager
 * @property string $total_sales
 */
class SalesByStore extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_by_store';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store' => Yii::t('app', 'Store'),
            'manager' => Yii::t('app', 'Manager'),
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
     * @return \frontend\models\activequery\SalesByStoreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\SalesByStoreQuery(get_called_class());
    }
}
