<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Workers $model */
$lang = Yii::$app->language;
$baseUrl = Yii::$app->request->baseUrl;

$this->title = $model->{"fullname_$lang"};
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workers-view">
    <div class="row">
        <div class="col-md-4">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4 text-end">
            <div class="btn-group">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#workerInfoModal">
                    Подробно
                </button>
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
    <!-- Modal -->
    <div class="modal fade" id="workerInfoModal" tabindex="-1" aria-labelledby="workerInfoModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="workerInfoModalLabel">Информация о сотруднике</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'id',
                            [
                                'attribute' => 'department_id',
                                'value' => function ($model) {
                                    return $model->department->{'name_' . Yii::$app->language};
                                }
                            ],
                            [
                                'attribute' => 'company_id',
                                'value' => function ($data) {
                                    return $data->company->{'name_' . Yii::$app->language};
                                }
                            ],
                            [
                                'label' => 'Ф.И.О',
                                'value' => function ($data) {
                                    return $data->{'fullname_' . Yii::$app->language};
                                }
                            ],
                            //'fullname_uz',
                            'phone',
                            [
                                'attribute' => 'birthday',
                                'value' => function ($data) {
                                    return Yii::$app->formatter->asDate($data->birthday, 'd.MM.Y');
                                }
                            ],
                            'passport_series',
                            'passport_pinfl',
                            'passport_address',
                            'passport_end_date',
                            [
                                'label' => 'Адрес',
                                'value' => function ($data) {
                                    return $data->{'address_' . Yii::$app->language};
                                }
                            ],
                            'image',
                            [
                                'attribute' => 'created',
                                'value' => function ($data) {
                                    return Yii::$app->formatter->asDate($data->created, 'dd.MM.yyyy');
                                }
                            ],
                            [
                                'attribute' => 'updated',
                                'value' => function ($data) {
                                    return Yii::$app->formatter->asDate($data->updated, 'dd.MM.yyyy');
                                }
                            ],
                            //'status',
                            [
                                'attribute' => 'worker_status_id',
                                'value' => function ($data) {
                                    return $data->workerStatus->{'name_' . Yii::$app->language};
                                }
                            ],
                            //'stavka_id',
                            [
                                'attribute' => 'position_id',
                                'value' => function ($data) {
                                    return $data->position->{'name_' . Yii::$app->language};
                                }
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-4">

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-secondary rounded-5 shadow-sm" id="workerInfoTab"
                role="tablist"
                style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Документы
                        Сотрудников
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Дополнительные
                        номера
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane"
                            type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Дети
                        сотрудников
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                     aria-labelledby="profile-tab"
                     tabindex="0">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Документы сотрудников</h3>
                        </div>
                        <div class="col-md-4">
                            <button class="btn w-100 btn-success" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#addFileCollapse" aria-expanded="false"
                                    aria-controls="addFileCollapse">
                                Добавить документ <i class="bi bi-plus-square"></i>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="collapse" id="addFileCollapse">
                                <div class="card card-body">
                                    <?= $this->render('_form_files', [
                                        'model' => new \common\models\WorkerFiles(),
                                        'worker_id' => $model->id,
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <table class="table table-sm table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Документ</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($worker_files as $item): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item->{"name_$lang"} ?></td>
                                        <td><?= $item->image ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Скачать <i class="bi bi-download"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <?= Html::a('Удалить <i class="bi bi-trash"></i>', ['workers/delete-file', 'id' => $item->id], ['class' => 'btn btn-sm btn-danger']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                     tabindex="0">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>
                                Дополнительные номера сотрудников
                            </h3>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                Добавить номер <i class="bi bi-plus-square"></i>
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6 mt-3">
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <?= $this->render('_form_phones', ['model' => new \common\models\WorkerPhones(), 'worker_id' => $model->id]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-12 mt-3">
                            <table class="table table-sm table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Номер телефона</th>
                                    <th>Дата создания</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($worker_phones as $item): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item->phone ?></td>
                                        <td><?= date('d.m.Y', $item->created) ?></td>
                                        <td>
                                            <?php if ($item->status == 0) {
                                                echo Html::a(Yii::$app->params['status'][$lang][$item->status] . ' <i class="bi bi-check-square"></i>', ['workers/phone-status', 'id' => $item->id, 'status' => 1], ['class' => 'btn btn-sm btn-success w-100', 'data-confirm' => 'Подтвердите действие!!!']);
                                            } else {
                                                echo Html::a(Yii::$app->params['status'][$lang][$item->status] . ' <i class="bi bi-exclamation-lg"></i>', ['workers/phone-status', 'id' => $item->id, 'status' => 0], ['class' => 'btn btn-sm btn-warning w-100', 'data-confirm' => 'Подтвердите действие!!!']);
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= Html::a('<i class="bi bi-trash"></i>', ['delete-phone', 'id' => $item->id], ['class' => 'btn btn-danger btn-sm', 'data-method' => 'post', 'data-confirm' => 'Подтвердите действие!!!']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                     tabindex="0">...
                </div>
            </div>
        </div>
    </div>
</div>
