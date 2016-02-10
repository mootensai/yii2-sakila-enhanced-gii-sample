<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "rental".
 *
 * @property integer $rental_id
 * @property string $rental_date
 * @property string $inventory_id
 * @property integer $customer_id
 * @property string $return_date
 * @property integer $staff_id
 * @property string $last_update
 *
 * @property \frontend\models\Payment[] $payments
 * @property \frontend\models\Customer $customer
 * @property \frontend\models\Inventory $inventory
 * @property \frontend\models\Staff $staff
 */
class Rental extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rental';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rental_id' => Yii::t('app', 'Rental ID'),
            'rental_date' => Yii::t('app', 'Rental Date'),
            'inventory_id' => Yii::t('app', 'Inventory ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'return_date' => Yii::t('app', 'Return Date'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\frontend\models\Payment::className(), ['rental_id' => 'rental_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\frontend\models\Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasOne(\frontend\models\Inventory::className(), ['inventory_id' => 'inventory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(\frontend\models\Staff::className(), ['staff_id' => 'staff_id']);
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
     * @return \frontend\models\activequery\RentalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\RentalQuery(get_called_class());
    }
}
