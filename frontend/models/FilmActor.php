<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\FilmActor as BaseFilmActor;

/**
 * This is the model class for table "film_actor".
 */
class FilmActor extends BaseFilmActor
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actor_id', 'film_id'], 'required'],
            [['actor_id', 'film_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }
	
}
