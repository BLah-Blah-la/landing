<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Titles */

$this->title = Yii::t('modules/notifications','Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications', 'Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->section, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
