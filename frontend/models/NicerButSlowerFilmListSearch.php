<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\NicerButSlowerFilmList;

/**
 * frontend\models\NicerButSlowerFilmListSearch represents the model behind the search form about `frontend\models\NicerButSlowerFilmList`.
 */
 class NicerButSlowerFilmListSearch extends NicerButSlowerFilmList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FID', 'length'], 'integer'],
            [['title', 'description', 'category', 'rating', 'actors'], 'safe'],
            [['price'], 'number'],
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
        $query = NicerButSlowerFilmList::find();

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
            'FID' => $this->FID,
            'price' => $this->price,
            'length' => $this->length,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'actors', $this->actors]);

        return $dataProvider;
    }
}
