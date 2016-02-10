<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\SalesByStore as BaseSalesByStore;

/**
 * This is the model class for table "sales_by_store".
 */
class SalesByStore extends BaseSalesByStore
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_sales'], 'number'],
            [['store'], 'string', 'max' => 101],
            [['manager'], 'string', 'max' => 91]
        ];
    }
	
}
