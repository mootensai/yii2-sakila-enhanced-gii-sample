<?php

namespace frontend\models\activequery;

/**
 * This is the ActiveQuery class for [[\frontend\models\activequery\NicerButSlowerFilmList]].
 *
 * @see \frontend\models\activequery\NicerButSlowerFilmList
 */
class NicerButSlowerFilmListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\NicerButSlowerFilmList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\NicerButSlowerFilmList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}