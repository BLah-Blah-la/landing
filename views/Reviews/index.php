<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reviews', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Avatar',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute($data->getAvatar()),[
                        'style' => 'width:50px;height:50px'
                    ]);
                },
            ],
	
            'customer.name',
			'customer.surname',
			'customer.status',
            'text:ntext',

            [
                'label' => 'Image',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute($data->image_site),[
                        'style' => 'width:50px;height:50px'
                    ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>