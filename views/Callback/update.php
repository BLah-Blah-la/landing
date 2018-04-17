<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Callback */

$this->title = Yii::t('modules/notifications', 'Update');

$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('modules/notifications', 'Update');
?>
<div class="callback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
