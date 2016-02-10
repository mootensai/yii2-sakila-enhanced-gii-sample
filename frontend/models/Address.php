<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Address as BaseAddress;

/**
 * This is the model class for table "address".
 */
class Address extends BaseAddress
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'district', 'city_id', 'phone'], 'required'],
            [['city_id'], 'integer'],
            [['last_update'], 'safe'],
            [['address', 'address2'], 'string', 'max' => 50],
            [['district', 'phone'], 'string', 'max' => 20],
            [['postal_code'], 'string', 'max' => 10]
        ];
    }
	
}
