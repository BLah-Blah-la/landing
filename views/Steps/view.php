<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Steps */

$this->title = $model->title_item;
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications','Steps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="steps-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('modules/notifications','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('modules/notifications','Delete'), ['delete', 'id' => $model->id], [
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
            'title_item',
            'description:ntext',
			[
                /* 'attribute' => 'logo', */
                'label' =>  Yii::t('modules/notifications',  'Image'),
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
        ],
		]) ?>

</div>
