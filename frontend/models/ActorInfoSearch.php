<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ActorInfo;

/**
 * frontend\models\ActorInfoSearch represents the model behind the search form about `frontend\models\ActorInfo`.
 */
 class ActorInfoSearch extends ActorInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actor_id'], 'integer'],
            [['first_name', 'last_name', 'film_info'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ActorInfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'actor_id' => $this->actor_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'film_info', $this->film_info]);

        return $dataProvider;
    }
}
