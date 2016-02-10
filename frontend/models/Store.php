<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Store as BaseStore;

/**
 * This is the model class for table "store".
 */
class Store extends BaseStore
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manager_staff_id', 'address_id'], 'required'],
            [['manager_staff_id', 'address_id'], 'integer'],
            [['last_update'], 'safe'],
            [['manager_staff_id'], 'unique']
        ];
    }
	
}
