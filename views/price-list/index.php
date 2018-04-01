<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing\search\PriceList */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Price Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Price List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'options' => ['class' => 'table-responsive'],
        'tableOptions' => ['class' => 'table table-condensed'],
		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'value',
            'terms:ntext',
			[
			  'attribute' => 'description',
			  'options' => ['style' => 'width: 65px; max-width: 65px;'],
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
