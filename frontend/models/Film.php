<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Film as BaseFilm;

/**
 * This is the model class for table "film".
 */
class Film extends BaseFilm
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'language_id'], 'required'],
            [['description', 'rating', 'special_features'], 'string'],
            [['release_year', 'last_update'], 'safe'],
            [['language_id', 'original_language_id', 'rental_duration', 'length'], 'integer'],
            [['rental_rate', 'replacement_cost'], 'number'],
            [['title'], 'string', 'max' => 255]
        ];
    }
	
}
