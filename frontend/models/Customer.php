<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Customer as BaseCustomer;

/**
 * This is the model class for table "customer".
 */
class Customer extends BaseCustomer
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'first_name', 'last_name', 'address_id', 'create_date'], 'required'],
            [['store_id', 'address_id', 'active'], 'integer'],
            [['create_date', 'last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50]
        ];
    }
	
}
