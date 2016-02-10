<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "store".
 *
 * @property integer $store_id
 * @property integer $manager_staff_id
 * @property integer $address_id
 * @property string $last_update
 *
 * @property \frontend\models\Customer[] $customers
 * @property \frontend\models\Inventory[] $inventories
 * @property \frontend\models\Staff[] $staff
 * @property \frontend\models\Address $address
 * @property \frontend\models\Staff $managerStaff
 */
class Store extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => Yii::t('app', 'Store ID'),
            'manager_staff_id' => Yii::t('app', 'Manager Staff ID'),
            'address_id' => Yii::t('app', 'Address ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(\frontend\models\Customer::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(\frontend\models\Inventory::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(\frontend\models\Staff::className(), ['store_id' => 'store_id']);
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
    public function getManagerStaff()
    {
        return $this->hasOne(\frontend\models\Staff::className(), ['staff_id' => 'manager_staff_id']);
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
     * @return \frontend\models\activequery\StoreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\StoreQuery(get_called_class());
    }
}
