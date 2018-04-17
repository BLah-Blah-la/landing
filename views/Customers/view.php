<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('modules/notifications', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('modules/notifications', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
			 'attribute' => 'price.name',
			 'label' => Yii::t('modules/notifications', 'PriceList'),
			],
            'name',
			'email',
            'phone_digital',
            'status',
            [
            'attribute'=>'created_at',
            'label'=> Yii::t('modules/notifications', 'created_at'),
            'format' =>  ['date', 'HH:mm:ss dd.MM.Y'], // Доступные модификаторы - date:datetime:time
            'headerOptions' => ['width' => '200'],
            ],
			[
            'attribute'=>'updated_at',
            'label'=> Yii::t('modules/notifications', 'updated_at'),
            'format' =>  ['date', 'HH:mm:ss dd.MM.Y'], // Доступные модификаторы - date:datetime:time
            'headerOptions' => ['width' => '200'],
            ],
        ],
    ]) ?>

</div>
