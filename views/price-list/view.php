<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\PriceList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications', 'Price-lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-list-view">

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

            'name',
            'value',
            'terms:ntext',
			'description',
        ],
    ]) ?>

</div>
