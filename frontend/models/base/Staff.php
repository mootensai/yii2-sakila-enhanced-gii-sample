<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "staff".
 *
 * @property integer $staff_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $address_id
 * @property resource $picture
 * @property string $email
 * @property integer $store_id
 * @property integer $active
 * @property string $username
 * @property string $password
 * @property string $last_update
 *
 * @property \frontend\models\Payment[] $payments
 * @property \frontend\models\Rental[] $rentals
 * @property \frontend\models\Address $address
 * @property \frontend\models\Store $store
 */
class Staff extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => Yii::t('app', 'Staff ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'address_id' => Yii::t('app', 'Address ID'),
            'picture' => Yii::t('app', 'Picture'),
            'email' => Yii::t('app', 'Email'),
            'store_id' => Yii::t('app', 'Store ID'),
            'active' => Yii::t('app', 'Active'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\frontend\models\Payment::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(\frontend\models\Rental::className(), ['staff_id' => 'staff_id']);
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
        return $this->hasOne(\frontend\models\Store::className(), ['manager_staff_id' => 'staff_id']);
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
     * @return \frontend\models\activequery\StaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\StaffQuery(get_called_class());
    }
}
