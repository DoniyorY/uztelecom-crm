<?php

use common\models\WorkerAvailability;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\WorkerAvailabilitySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Worker Availabilities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-availability-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Worker Availability', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'worker_id',
            'type_id',
            'day_start',
            'day_end',
            //'content:ntext',
            //'image',
            //'created',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkerAvailability $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
