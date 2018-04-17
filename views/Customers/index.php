<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\landing */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('modules/notifications', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('modules/notifications', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     
    <?php /* $dataProviderList->pagination->pageParam = 'PriceListModel-page';
          $dataProviderList->sort->sortParam = 'PriceListModel-sort'; */
	
	?>
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	    'options' => ['class' => 'table-responsive'],
        'tableOptions' => ['class' => 'table table-condensed'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             
             
            [
			 'attribute' => 'price.name',
			 'label' => Yii::t('modules/notifications', 'PriceList'),
			],
            'name',
			'email',
            'phone_digital',
            'status',
        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
