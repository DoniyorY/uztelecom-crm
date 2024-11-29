<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
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
                    <h5 class="modal-title" id="myModalLabel">Новый пользователь</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $this->render('_form', [
                        'model' => new User(),
                    ]) ?>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ($model->status == 10) {
                return ['class' => 'table-success'];
            } else {
                return ['class' => 'table-warning'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            'fullname',
            'phone',
            [
                'attribute' => 'role_id',
                'value' => function ($model) {
                    return Yii::$app->params['user_role'][$model->role_id];
                },
                'filter'=>Yii::$app->params['user_role'],
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            [
                'attribute' => 'created_at',
                'value' => function ($data) {
                    return date('d.m.Y', $data->created_at);
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return Html::button(Yii::$app->params['user_status'][$data->status], ['class' => Yii::$app->params['user_status_class'][$data->status]]);
                },
                'format' => 'raw',
                'filter'=>Yii::$app->params['user_status'],
            ],
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
