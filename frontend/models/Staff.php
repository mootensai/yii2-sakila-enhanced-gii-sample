<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Staff as BaseStaff;

/**
 * This is the model class for table "staff".
 */
class Staff extends BaseStaff
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address_id', 'store_id', 'username'], 'required'],
            [['address_id', 'store_id', 'active'], 'integer'],
            [['picture'], 'string'],
            [['last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 16],
            [['password'], 'string', 'max' => 40]
        ];
    }
	
}
