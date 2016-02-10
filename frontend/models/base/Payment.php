<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "payment".
 *
 * @property integer $payment_id
 * @property integer $customer_id
 * @property integer $staff_id
 * @property integer $rental_id
 * @property string $amount
 * @property string $payment_date
 * @property string $last_update
 *
 * @property \frontend\models\Customer $customer
 * @property \frontend\models\Rental $rental
 * @property \frontend\models\Staff $staff
 */
class Payment extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => Yii::t('app', 'Payment ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'rental_id' => Yii::t('app', 'Rental ID'),
            'amount' => Yii::t('app', 'Amount'),
            'payment_date' => Yii::t('app', 'Payment Date'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
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
    public function getRental()
    {
        return $this->hasOne(\frontend\models\Rental::className(), ['rental_id' => 'rental_id']);
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
     * @return \frontend\models\activequery\PaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\PaymentQuery(get_called_class());
    }
}
