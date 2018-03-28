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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
			 'label' => 'price',
			],
            'name',
			'surname',
			'email',
			'name_company',
            'phone_digital',
            'status',
            [
            'attribute'=>'declared_in',
            'label'=>'Подал заявку',
            'format' =>  ['date', 'HH:mm:ss dd.MM.Y'], // Доступные модификаторы - date:datetime:time
            'headerOptions' => ['width' => '200'],
            ],
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
        ],
    ]) ?>

</div>
