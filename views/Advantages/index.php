<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\AdvantagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advantages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advantages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'description:ntext',
            
            [
                /* 'attribute' => 'logo', */
                'label' => 'Логотип',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute($data->logo),[

                        'style' => 'width:50px;height:50px'
                    ]);
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
