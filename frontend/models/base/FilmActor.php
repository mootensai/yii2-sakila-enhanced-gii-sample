<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "film_actor".
 *
 * @property integer $actor_id
 * @property integer $film_id
 * @property string $last_update
 *
 * @property \frontend\models\Actor $actor
 * @property \frontend\models\Film $film
 */
class FilmActor extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_actor';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => Yii::t('app', 'Actor ID'),
            'film_id' => Yii::t('app', 'Film ID'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(\frontend\models\Actor::className(), ['actor_id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(\frontend\models\Film::className(), ['film_id' => 'film_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'last_update',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\FilmActorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\FilmActorQuery(get_called_class());
    }
}
