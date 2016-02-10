<?php

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "nicer_but_slower_film_list".
 *
 * @property integer $FID
 * @property string $title
 * @property string $description
 * @property string $category
 * @property string $price
 * @property integer $length
 * @property string $rating
 * @property string $actors
 */
class NicerButSlowerFilmList extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nicer_but_slower_film_list';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FID' => Yii::t('app', 'Fid'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'category' => Yii::t('app', 'Category'),
            'price' => Yii::t('app', 'Price'),
            'length' => Yii::t('app', 'Length'),
            'rating' => Yii::t('app', 'Rating'),
            'actors' => Yii::t('app', 'Actors'),
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
     * @return \frontend\models\activequery\NicerButSlowerFilmListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\activequery\NicerButSlowerFilmListQuery(get_called_class());
    }
}
