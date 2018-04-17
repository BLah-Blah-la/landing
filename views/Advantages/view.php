<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\landing\Advantages */
use nirvana\showloading\ShowLoadingAsset;
use timurmelnikov\widgets\LoadingOverlayPjax;
use vendor\landing\partner\models\Advantages;
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/notifications', 'Advantages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advantages-view">

    <h1><?= Html::encode($this->title) ?></h1>
<script>
$('#my-content-panel-id').showLoading();
$('#my-content-panel-id').hideLoading();
</script>
    <p>
	    	<?php LoadingOverlayPjax::begin([
                  'color'=> 'rgba(102, 255, 204, 0.2)',
                  'elementOverlay' => '#element'
]); ?>
        <?= Html::a(Yii::t('modules/notifications','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'id' => 'element']) ?>
        <?= Html::a(Yii::t('modules/notifications','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
			
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
			<?php LoadingOverlayPjax::end(); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
		'id' => 'my-content-panel-id',
        'attributes' => [

            'description:ntext',
             [
                /* 'attribute' => 'logo', */
                'label' => Yii::t('modules/notifications',  'Image'),
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
					[$data->logo],
					['data-fancybox' => 'gallery']
				);
                },
            ],

        ],
    ]) ?>


</div>
