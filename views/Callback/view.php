<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Callback */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'phone_digital',
            'status',
			[
            'attribute'=> 'created_at',
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
