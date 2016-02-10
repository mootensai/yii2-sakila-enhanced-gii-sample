<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\FilmText as BaseFilmText;

/**
 * This is the model class for table "film_text".
 */
class FilmText extends BaseFilmText
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'title'], 'required'],
            [['film_id'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }
	
}
