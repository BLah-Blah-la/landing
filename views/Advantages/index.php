<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use timurmelnikov\widgets\LoadingOverlayPjax;
use yii2mod\linkpreview\LinkPreview;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\AdvantagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advantages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-index" id = "element">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php LoadingOverlayPjax::begin([
                  'color'=> 'rgba(255, 255, 255, 0.6)',
				  'fontawesome' => 'fa fa-spinner fa-spin',
                  'elementOverlay' => '#element'
    ]); ?>
    <p>
	
        <?= Html::a('Create Advantages', ['create'], ['class' => 'btn btn-success', 'id' => 'element']) ?>
    </p>
   <?php LoadingOverlayPjax::end(); ?>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'id' => 'element',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'description:ntext',
            
            [
                /* 'attribute' => 'logo', */
                'label' => 'Логотип',
                'format' => 'raw',
                'value' => function($data){
                    return 
					Html::a(
					Html::img(Url::toRoute($data->preview),[

                        'style' => 'width:50px;height:50px',
						'id' => 'img',
                    ]),
					/* 'url' => Html::img(Url::toRoute($data->logo),[

                        'style' => 'width:150px;height:150px',
                    ]), */
					[$data->logo],
					['data-fancybox' => 'gallery']
				);
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
             'header'=>'Действия',
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}{link}',

],
        ],
    ]); ?>	
    <?php Pjax::end(); ?>
</div>
	
