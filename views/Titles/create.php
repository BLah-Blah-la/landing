<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\landing\Titles */

$this->title = Yii::t('modules/notifications', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications', 'Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
