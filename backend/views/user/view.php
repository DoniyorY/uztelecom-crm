<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4 text-end">
            <div class="btn-group">
                <?php
                if ($model->status == 10) {
                    echo Html::a(Yii::$app->params['user_status'][$model->status], ['user/status', 'id' => $model->id, 'status' => 9], ['class' => 'btn btn-success', 'data-confirm' => 'Подтвердите действие!!!']);
                } else {
                    echo Html::a(Yii::$app->params['user_status'][$model->status], ['user/status', 'id' => $model->id, 'status' => 10], ['class' => 'btn btn-warning', 'data-confirm' => 'Подтвердите действие!!!']);
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
        <div class="col-md-5">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'fullname',
                    'phone',
                    [
                        'attribute' => 'role_id',
                        'value' => function ($data) {
                            return Yii::$app->params['user_role'][$data->role_id];
                        }
                    ],
                    //'auth_key',
                    //'password_hash',
                    //'password_reset_token',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return Yii::$app->params['user_status'][$data->status];
                        }
                    ],
                    [
                        'attribute' => 'created_at',
                        'value' => function ($data) {
                            return date('d.m.Y', $data->created_at);
                        }
                    ],
                    [
                        'attribute' => 'updated_at',
                        'value' => function ($data) {
                            return date('d.m.Y', $data->updated_at);
                        }
                    ],
                    //'verification_token',
                ],
            ]) ?>
        </div>
    </div>


</div>
