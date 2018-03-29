<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\Logo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Logo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'width: 200px; max-width: 200px;', 'class'=> 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3'],
        
        'columns' => [
		
            ['class' => 'yii\grid\SerialColumn',
			   'header' => '#',
			
			],
            [

                'label' => 'Логотип',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute($data->logo_image),[

                        'style' => 'width:250px;height:250px'
                    ]);
                },
				
			    'contentOptions' => ['style' => 'width:170px;color:red'],
            ],
			['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
/* 				'contentOptions' => ['style' => 'width:70px;color:red', ], */
            ],

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
