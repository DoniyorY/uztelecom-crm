<?php

use common\models\Company;
use common\models\Regions;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CompanySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Филиалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">
    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#myModal">
                Добавить
            </button>
        </div>
    </div>
    <!-- Default Modals -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Добавить филлиал</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $this->render('_form', [
                        'model' => new Company(),
                    ]) ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($data) {
            if ($data->status == 0){
                return ['class'=>'table-success'];
            }else{
                return ['class'=>'table-danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'region_id',
                'value' => function ($data) {
                    return $data->region->name_ru;
                },
                'filter' => Select2::widget([
                    'name' => 'region_id',
                    'data' => \yii\helpers\ArrayHelper::map(Regions::find()->all(), 'id', 'name_ru'),
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]),
            ],
            'name_ru',
            'name_uz',
            [
                'attribute' => 'created',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created);
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Yii::$app->params['status'][Yii::$app->language][$data->status];
                },
                'filter'=>Yii::$app->params['status'][Yii::$app->language],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Company $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
