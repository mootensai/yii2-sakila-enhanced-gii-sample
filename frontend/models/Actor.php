<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Actor as BaseActor;

/**
 * This is the model class for table "actor".
 */
class Actor extends BaseActor
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45]
        ];
    }
	
}
