<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Language as BaseLanguage;

/**
 * This is the model class for table "language".
 */
class Language extends BaseLanguage
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 20]
        ];
    }
	
}
