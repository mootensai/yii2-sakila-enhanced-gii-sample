<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Inventory as BaseInventory;

/**
 * This is the model class for table "inventory".
 */
class Inventory extends BaseInventory
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'store_id'], 'required'],
            [['film_id', 'store_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }
	
}
