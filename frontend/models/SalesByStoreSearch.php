<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SalesByStore;

/**
 * frontend\models\SalesByStoreSearch represents the model behind the search form about `frontend\models\SalesByStore`.
 */
 class SalesByStoreSearch extends SalesByStore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store', 'manager'], 'safe'],
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
        $query = SalesByStore::find();

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

        $query->andFilterWhere(['like', 'store', $this->store])
            ->andFilterWhere(['like', 'manager', $this->manager]);

        return $dataProvider;
    }
}
