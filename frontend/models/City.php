<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\City as BaseCity;

/**
 * This is the model class for table "city".
 */
class City extends BaseCity
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['last_update'], 'safe'],
            [['city'], 'string', 'max' => 50]
        ];
    }
	
}
