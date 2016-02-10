<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "film".
 *
 * @property integer $film_id
 * @property string $title
 * @property string $description
 * @property string $release_year
 * @property integer $language_id
 * @property integer $original_language_id
 * @property integer $rental_duration
 * @property string $rental_rate
 * @property integer $length
 * @property string $replacement_cost
 * @property string $rating
 * @property string $special_features
 * @property string $last_update
 *
 * @property \frontend\models\Language $language
 * @property \frontend\models\Language $originalLanguage
 * @property \frontend\models\FilmActor[] $filmActors
 * @property \frontend\models\Actor[] $actors
 * @property \frontend\models\FilmCategory[] $filmCategories
 * @property \frontend\models\Category[] $categories
 * @property \frontend\models\Inventory[] $inventories
 */
class Film extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film';
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
            'release_year' => Yii::t('app', 'Release Year'),
            'language_id' => Yii::t('app', 'Language ID'),
            'original_language_id' => Yii::t('app', 'Original Language ID'),
            'rental_duration' => Yii::t('app', 'Rental Duration'),
            'rental_rate' => Yii::t('app', 'Rental Rate'),
            'length' => Yii::t('app', 'Length'),
            'replacement_cost' => Yii::t('app', 'Replacement Cost'),
            'rating' => Yii::t('app', 'Rating'),
            'special_features' => Yii::t('app', 'Special Features'),
            'last_update' => Yii::t('app', 'Last Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(\frontend\models\Language::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginalLanguage()
    {
        return $this->hasOne(\frontend\models\Language::className(), ['language_id' => 'original_language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmActors()
    {
        return $this->hasMany(\frontend\models\FilmActor::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(\frontend\models\Actor::className(), ['actor_id' => 'actor_id'])->viaTable('film_actor', ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmCategories()
    {
        return $this->hasMany(\frontend\models\FilmCategory::className(), ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(\frontend\models\Category::className(), ['category_id' => 'category_id'])->viaTable('film_category', ['film_id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(\frontend\models\Inventory::className(), ['film_id' => 'film_id']);
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
     * @return \frontend\models\activequery\FilmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\FilmQuery(get_called_class());
    }
}
