<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\FilmList as BaseFilmList;

/**
 * This is the model class for table "film_list".
 */
class FilmList extends BaseFilmList
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FID', 'length'], 'integer'],
            [['description', 'rating', 'actors'], 'string'],
            [['category'], 'required'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['category'], 'string', 'max' => 25]
        ];
    }
	
}
