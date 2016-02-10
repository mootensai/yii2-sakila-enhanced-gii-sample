<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "customer".
 *
 * @property integer $customer_id
 * @property integer $store_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $address_id
 * @property integer $active
 * @property string $create_date
 * @property string $last_update
 *
 * @property \frontend\models\Address $address
 * @property \frontend\models\Store $store
 * @property \frontend\models\Payment[] $payments
 * @property \frontend\models\Rental[] $rentals
 */
class Customer extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => Yii::t('app', 'Customer ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'address_id' => Yii::t('app', 'Address ID'),
            'active' => Yii::t('app', 'Active'),
            'create_date' => Yii::t('app', 'Create Date'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(\frontend\models\Address::className(), ['address_id' => 'address_id']);
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
    public function getPayments()
    {
        return $this->hasMany(\frontend\models\Payment::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(\frontend\models\Rental::className(), ['customer_id' => 'customer_id']);
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
     * @return \frontend\models\activequery\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\CustomerQuery(get_called_class());
    }
}
