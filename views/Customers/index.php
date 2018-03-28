<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     
    <?php /* $dataProviderList->pagination->pageParam = 'PriceListModel-page';
          $dataProviderList->sort->sortParam = 'PriceListModel-sort'; */
	
	?>
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             
             
            [
			 'attribute' => 'price.name',
			 'label' => 'price',
			],
            'name',
			'surname',
			'email',
			'name_company',
            'phone_digital',
            'status',
            [
                /* 'attribute' => 'logo', */
                'label' => 'Аватар',
                'format' => 'raw',
                'value' => function($data){
					if($data->avatar !== NULL){
                    return Html::img(Url::toRoute($data->avatar),[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:50px;height:50px'
                    ]);
                 }
				},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
