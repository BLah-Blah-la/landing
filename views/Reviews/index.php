<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('modules/notifications', 'Reviews');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('modules/notifications', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'options' => ['class' => 'table-responsive'],
        'tableOptions' => ['class' => 'table table-condensed'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
	
            'name',
			'surname',
			'status',
            'text:ntext',
            [
                /* 'attribute' => 'logo', */
                'label' => Yii::t('modules/notifications',  'Image'),
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
					[$data->image],
					['data-fancybox' => 'gallery']
				);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
