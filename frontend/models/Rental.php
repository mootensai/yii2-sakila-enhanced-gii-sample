<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Rental as BaseRental;

/**
 * This is the model class for table "rental".
 */
class Rental extends BaseRental
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rental_date', 'inventory_id', 'customer_id', 'staff_id'], 'required'],
            [['rental_date', 'return_date', 'last_update'], 'safe'],
            [['inventory_id', 'customer_id', 'staff_id'], 'integer'],
            [['rental_date', 'inventory_id', 'customer_id'], 'unique', 'targetAttribute' => ['rental_date', 'inventory_id', 'customer_id'], 'message' => 'The combination of Rental Date, Inventory ID and Customer ID has already been taken.']
        ];
    }
	
}
