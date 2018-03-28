<?php

namespace vendor\landing\partner\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\landing\partner\models\PriceList as PriceListModel;

/**
 * PriceList represents the model behind the search form of `backend\models\landing\PriceList`.
 */
class PriceListSearch extends PriceListModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'value'], 'integer'],
            [['name', 'terms', 'description'], 'safe'],
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
        $query = PriceListModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'value' => $this->value,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'terms', $this->terms])
			->andFilterWhere(['like', 'description', $this->terms]);

        return $dataProvider;
    }
}
