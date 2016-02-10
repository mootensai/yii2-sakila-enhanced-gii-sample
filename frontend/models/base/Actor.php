<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "actor".
 *
 * @property integer $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property string $last_update
 *
 * @property \frontend\models\FilmActor[] $filmActors
 * @property \frontend\models\Film[] $films
 */
class Actor extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actor';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => Yii::t('app', 'Actor ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmActors()
    {
        return $this->hasMany(\frontend\models\FilmActor::className(), ['actor_id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(\frontend\models\Film::className(), ['film_id' => 'film_id'])->viaTable('film_actor', ['actor_id' => 'actor_id']);
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
     * @return \frontend\models\activequery\ActorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\ActorQuery(get_called_class());
    }
}
