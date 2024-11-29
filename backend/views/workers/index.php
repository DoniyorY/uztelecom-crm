<?php

use common\models\Workers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\WorkersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workers-index">
    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4">
            <?= Html::a('Добавить', ['create'], ['class' => 'btn w-100 btn-success']) ?>
        </div>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fullname_ru',
            [
                'attribute' => 'department_id',
                'value' => function ($data) {
                    return $data->department->name_ru;
                }
            ],
            [
                'attribute' => 'company_id',
                'value' => function ($data) {
                    return $data->company->name_ru;
                }
            ],
            //'fullname_uz',
            'phone',
            'birthday',
            //'passport_series',
            //'passport_pinfl',
            //'passport_address',
            //'passport_end_date',
            //'address_ru',
            //'address_uz',
            //'image',
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
            //'updated',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->status;
                }
            ],
            //'worker_status_id',
            //'stavka_id',
            'position_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Workers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
