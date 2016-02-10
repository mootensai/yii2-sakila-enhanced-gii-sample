<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "film_text".
 *
 * @property integer $film_id
 * @property string $title
 * @property string $description
 */
class FilmText extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_text';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'film_id' => Yii::t('app', 'Film ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
        ];
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
     * @return \frontend\models\activequery\FilmTextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\FilmTextQuery(get_called_class());
    }
}
