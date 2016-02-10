<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\ActorInfo as BaseActorInfo;

/**
 * This is the model class for table "actor_info".
 */
class ActorInfo extends BaseActorInfo
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actor_id'], 'integer'],
            [['first_name', 'last_name'], 'required'],
            [['film_info'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 45]
        ];
    }
	
}
