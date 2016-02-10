<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "inventory".
 *
 * @property string $inventory_id
 * @property integer $film_id
 * @property integer $store_id
 * @property string $last_update
 *
 * @property \frontend\models\Film $film
 * @property \frontend\models\Store $store
 * @property \frontend\models\Rental[] $rentals
 */
class Inventory extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_id' => Yii::t('app', 'Inventory ID'),
            'film_id' => Yii::t('app', 'Film ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(\frontend\models\Film::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(\frontend\models\Store::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(\frontend\models\Rental::className(), ['inventory_id' => 'inventory_id']);
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
     * @return \frontend\models\activequery\InventoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\InventoryQuery(get_called_class());
    }
}
