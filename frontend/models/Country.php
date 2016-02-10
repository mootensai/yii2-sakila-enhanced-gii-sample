<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Country as BaseCountry;

/**
 * This is the model class for table "country".
 */
class Country extends BaseCountry
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country'], 'required'],
            [['last_update'], 'safe'],
            [['country'], 'string', 'max' => 50]
        ];
    }
	
}
