<?php

namespace vendor\landing\partner\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\landing\partner\models\Portfolio;
use yii\helpers\ArrayHelper;
/**

 */
 
class PortfolioSearch extends Portfolio
{
    /**
     * @inheritdoc
     */
	public function attributes()
    {
		// делаем поле зависимости доступным для поиска
		return ArrayHelper::merge(parent::attributes(), ['customer.name_company']);
    }
	
    public function rules()
    {
        return [
            [['id', 'id_customer'], 'integer'],
            [['image_site'], 'safe'],
			[['customer.name_company'], 'safe'],
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
        $query = Portfolio::find();

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
        $dataProvider->sort->attributes['customer.name_company'] = [
		'asc' => ['customer.name_company' => SORT_ASC],
		'desc' => ['customer.name_company' => SORT_DESC],
		];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
         
        $query->andFilterWhere(['like', 'id_customer', $this->id_customer])
		      ->andFilterWhere(['like', 'customer.name_company', $this->getAttribute('customer.name_company')])
              ->andFilterWhere(['like', 'image_site', $this->image_site]);

        return $dataProvider;
    }
}
