<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\landing\Titles */

$this->title = 'Create Titles';
$this->params['breadcrumbs'][] = ['label' => 'Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
