<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Workers $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'department_id',
            'company_id',
            'fullname_ru',
            'fullname_uz',
            'phone',
            'birthday',
            'passport_series',
            'passport_pinfl',
            'passport_address',
            'passport_end_date',
            'address_ru',
            'address_uz',
            'image',
            'created',
            'updated',
            'status',
            'worker_status_id',
            'stavka_id',
            'position_id',
        ],
    ]) ?>

</div>
