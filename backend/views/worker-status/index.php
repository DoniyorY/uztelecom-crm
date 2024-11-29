<?php

use common\models\WorkerStatus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\WorkerStatusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Worker Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-status-index">
    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4">
            <div class="hstack gap-2 flex-wrap mb-3">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Добавить
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="collapse" id="collapseExample">
                <div class="card mb-0">
                    <div class="card-body">
                        <?= $this->render('_form', [
                            'model' => new WorkerStatus(),
                            'last_value' => WorkerStatus::find()->orderBy(['id' => SORT_DESC])->one(),
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name_ru',
            'name_uz',
            'value',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkerStatus $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
