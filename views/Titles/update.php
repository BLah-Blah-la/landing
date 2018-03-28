<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\landing\Titles */

$this->title = 'Update Titles: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->section, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
