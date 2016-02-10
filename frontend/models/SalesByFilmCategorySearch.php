<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SalesByFilmCategory;

/**
 * frontend\models\SalesByFilmCategorySearch represents the model behind the search form about `frontend\models\SalesByFilmCategory`.
 */
 class SalesByFilmCategorySearch extends SalesByFilmCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'safe'],
            [['total_sales'], 'number'],
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
        $query = SalesByFilmCategory::find();

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
            'total_sales' => $this->total_sales,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
