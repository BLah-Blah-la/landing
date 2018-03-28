<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Advantages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-view">

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

        ],
    ]) ?>

</div>
