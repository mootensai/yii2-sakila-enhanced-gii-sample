<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "category".
 *
 * @property integer $category_id
 * @property string $name
 * @property string $last_update
 *
 * @property \frontend\models\FilmCategory[] $filmCategories
 * @property \frontend\models\Film[] $films
 */
class Category extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmCategories()
    {
        return $this->hasMany(\frontend\models\FilmCategory::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(\frontend\models\Film::className(), ['film_id' => 'film_id'])->viaTable('film_category', ['category_id' => 'category_id']);
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
     * @return \frontend\models\activequery\CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\CategoryQuery(get_called_class());
    }
}
