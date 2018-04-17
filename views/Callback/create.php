<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Callback */

$this->title = Yii::t('modules/notifications', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
