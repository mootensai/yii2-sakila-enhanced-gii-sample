<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Payment as BasePayment;

/**
 * This is the model class for table "payment".
 */
class Payment extends BasePayment
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'staff_id', 'amount', 'payment_date'], 'required'],
            [['customer_id', 'staff_id', 'rental_id'], 'integer'],
            [['amount'], 'number'],
            [['payment_date', 'last_update'], 'safe']
        ];
    }
	
}
