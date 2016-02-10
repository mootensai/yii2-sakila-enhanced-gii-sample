<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\CustomerList as BaseCustomerList;

/**
 * This is the model class for table "customer_list".
 */
class CustomerList extends BaseCustomerList
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'SID'], 'integer'],
            [['address', 'phone', 'city', 'country', 'SID'], 'required'],
            [['name'], 'string', 'max' => 91],
            [['address', 'city', 'country'], 'string', 'max' => 50],
            [['zip code'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 20],
            [['notes'], 'string', 'max' => 6]
        ];
    }
	
}
