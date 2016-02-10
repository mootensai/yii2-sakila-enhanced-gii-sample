<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "address".
 *
 * @property integer $address_id
 * @property string $address
 * @property string $address2
 * @property string $district
 * @property integer $city_id
 * @property string $postal_code
 * @property string $phone
 * @property string $last_update
 *
 * @property \frontend\models\City $city
 * @property \frontend\models\Customer[] $customers
 * @property \frontend\models\Staff[] $staff
 * @property \frontend\models\Store[] $stores
 */
class Address extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => Yii::t('app', 'Address ID'),
            'address' => Yii::t('app', 'Address'),
            'address2' => Yii::t('app', 'Address2'),
            'district' => Yii::t('app', 'District'),
            'city_id' => Yii::t('app', 'City ID'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'phone' => Yii::t('app', 'Phone'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(\frontend\models\City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(\frontend\models\Customer::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(\frontend\models\Staff::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(\frontend\models\Store::className(), ['address_id' => 'address_id']);
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
     * @return \frontend\models\activequery\AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\AddressQuery(get_called_class());
    }
}
