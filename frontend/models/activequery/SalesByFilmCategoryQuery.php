<?php

namespace frontend\models\activequery;

/**
 * This is the ActiveQuery class for [[\frontend\models\activequery\SalesByFilmCategory]].
 *
 * @see \frontend\models\activequery\SalesByFilmCategory
 */
class SalesByFilmCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\SalesByFilmCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\SalesByFilmCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}