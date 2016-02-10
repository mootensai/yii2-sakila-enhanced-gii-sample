<?php

namespace frontend\models\activequery;

/**
 * This is the ActiveQuery class for [[\frontend\models\activequery\Store]].
 *
 * @see \frontend\models\activequery\Store
 */
class StoreQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\Store[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\Store|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}