<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FilmCategory;

/**
 * frontend\models\FilmCategorySearch represents the model behind the search form about `frontend\models\FilmCategory`.
 */
 class FilmCategorySearch extends FilmCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'category_id'], 'integer'],
            [['last_update'], 'safe'],
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
        $query = FilmCategory::find();

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
            'film_id' => $this->film_id,
            'category_id' => $this->category_id,
            'last_update' => $this->last_update,
        ]);

        return $dataProvider;
    }
}
