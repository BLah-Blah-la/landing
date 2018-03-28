<?php

namespace vendor\landing\partner\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\landing\partner\models\Reviews;
use yii\helpers\ArrayHelper;

/**
 * ReviewsSearch represents the model behind the search form of `backend\models\landing\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * @inheritdoc
     */
		
    public function attributes()
    {
		// делаем поле зависимости доступным для поиска
		return ArrayHelper::merge(parent::attributes(), ['customer.name', 'customer.surname', 'customer.status', 'customer.avatar']);
    }
	
    public function rules()
    {
        return [
            [['id', 'id_customer'], 'integer'],
            [['text', 'image_site'], 'safe'],
			[['customer.name', 'customer.surname', 'customer.status', 'customer.avatar'], 'safe'],
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
        $query = Reviews::find();

        // add conditions that should always apply here
        $query->joinWith( ['customer' => function($query) { 
				$query->from(['customer' => 'customers']);
			}
		]);
		
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
        $dataProvider->sort->attributes['customer.name'] = [
		'asc' => ['customer.name' => SORT_ASC],
		'desc' => ['customer.name' => SORT_DESC],
		];
		
		$dataProvider->sort->attributes['customer.surname'] = [
		'asc' => ['customer.surname' => SORT_ASC],
		'desc' => ['customer.surname' => SORT_DESC],
		];
		
		$dataProvider->sort->attributes['customer.status'] = [
		'asc' => ['customer.status' => SORT_ASC],
		'desc' => ['customer.status' => SORT_DESC],
		];
		
		$dataProvider->sort->attributes['customer.avatar'] = [
		'asc' => ['customer.avatar' => SORT_ASC],
		'desc' => ['customer.avatar' => SORT_DESC],
		];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
		      ->andFilterWhere(['like', 'customer.name', $this->getAttribute('customer.name')])
			  ->andFilterWhere(['like', 'customer.surname', $this->getAttribute('customer.surname')])
			  ->andFilterWhere(['like', 'customer.status', $this->getAttribute('customer.status')])
			  ->andFilterWhere(['like', 'customer.avatar', $this->getAttribute('customer.avatar')])
              ->andFilterWhere(['like', 'image_site', $this->image_site]);

        return $dataProvider;
    }
}
