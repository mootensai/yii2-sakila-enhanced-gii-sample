<?php

namespace frontend\models\activequery;

/**
 * This is the ActiveQuery class for [[\frontend\models\activequery\FilmActor]].
 *
 * @see \frontend\models\activequery\FilmActor
 */
class FilmActorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\FilmActor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\activequery\FilmActor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}