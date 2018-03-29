<?php

namespace vendor\landing\partner\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\landing\partner\models\Customers;
use yii\helpers\ArrayHelper;

/**
 * landing represents the model behind the search form of `backend\models\landing\Orders`.
 */
class CustomersSearch extends Customers
{
    /**
     * @inheritdoc
     */
	public function attributes(){
		
		return ArrayHelper::merge(parent::attributes(), ['price.name']);
		
	}
    public function rules()
    {
        return [
            [['id', 'price_name', 'created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'name_company', 'status', 'avatar', 'phone_digital'], 'safe'],
			[['email'], 'email'],
			[['price.name'], 'safe'],
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
        $query = Customers::find();

        // add conditions that should always apply here
        
        $query->joinWith(['price' => function($query){
			
			$query->from(['price' => 'price_list']);
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
        
		$dataProvider->sort->attributes['price.name'] = [
		'asc' => ['price.name' => SORT_ASC], 
		'desc' => ['price.name' => SORT_DESC],  
		];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price_name' => $this->price_name,
        ]);
		
        $query->andFilterWhere(['like', 'price.name', $this->getAttribute('price.name')]);
		
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone_digital', $this->phone_digital]);

        return $dataProvider;
    }
}
