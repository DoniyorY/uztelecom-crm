<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Company $model */

$lang = Yii::$app->language;
$this->title = $model->{"name_$lang"};
$params = Yii::$app->params;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view">
    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4 text-end">
            <div class="btn-group">
                <?php if ($model->status == 0) {
                    echo Html::a($params['status'][$lang][$model->status], ['status', 'id' => $model->id, 'status' => 1], [
                        'class' => 'btn btn-success',
                        'data-confirm' => 'Подтвердите действие!!!'
                    ]);
                } else {
                    Html::a($params['status'][$lang][$model->status], ['status', 'id' => $model->id, 'status' => 0], [
                        'class' => 'btn btn-danger',
                        'data-confirm' => 'Подтвердите действие!!!'
                    ]);
                }
                ?>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'region_id',
                'value' => function ($data) {
                    return $data->region->name_ru;
                }
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
                }
            ],
        ],
    ]) ?>

</div>
