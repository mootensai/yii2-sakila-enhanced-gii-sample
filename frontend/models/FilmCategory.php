<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\FilmCategory as BaseFilmCategory;

/**
 * This is the model class for table "film_category".
 */
class FilmCategory extends BaseFilmCategory
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'category_id'], 'required'],
            [['film_id', 'category_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }
	
}
