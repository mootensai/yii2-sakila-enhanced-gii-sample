<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\NicerButSlowerFilmList as BaseNicerButSlowerFilmList;

/**
 * This is the model class for table "nicer_but_slower_film_list".
 */
class NicerButSlowerFilmList extends BaseNicerButSlowerFilmList
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
