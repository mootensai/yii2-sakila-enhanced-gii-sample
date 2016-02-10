<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "staff_list".
 *
 * @property integer $ID
 * @property string $name
 * @property string $address
 * @property string $zip code
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property integer $SID
 */
class StaffList extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_list';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'zip code' => Yii::t('app', 'Zip Code'),
            'phone' => Yii::t('app', 'Phone'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
            'SID' => Yii::t('app', 'Sid'),
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
     * @return \frontend\models\activequery\StaffListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\StaffListQuery(get_called_class());
    }
}
