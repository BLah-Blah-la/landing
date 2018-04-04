<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\Logo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Логотип';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать логотип', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table-responsive'],
        'tableOptions' => ['class' => 'table table-condensed'],
        
        'columns' => [
		
            ['class' => 'yii\grid\SerialColumn',
			   'header' => '#',
			
			],
            [

                'label' => 'Логотип',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(
					Html::img(Url::toRoute($data->logo_image),[

                        'style' => 'width:50px;height:50px',
/* 						'class' => 'img-responsive', */
                    ]),
					/* 'url' => Html::img(Url::toRoute($data->logo),[

                        'style' => 'width:150px;height:150px',
                    ]), */
					[$data->logo_image],
					['data-fancybox' => 'gallery']
				);
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
