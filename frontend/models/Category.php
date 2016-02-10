<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Category as BaseCategory;

/**
 * This is the model class for table "category".
 */
class Category extends BaseCategory
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 25]
        ];
    }
	
}
