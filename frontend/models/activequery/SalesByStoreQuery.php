<?php

namespace frontend\models\activequery;

/**
 * This is the ActiveQuery class for [[\frontend\models\activequery\SalesByStore]].
 *
 * @see \frontend\models\activequery\SalesByStore
 */
class SalesByStoreQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\SalesByStore[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\SalesByStore|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}