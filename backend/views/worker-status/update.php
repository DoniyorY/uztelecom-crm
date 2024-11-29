<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkerStatus $model */

$this->title = 'Update Worker Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Worker Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worker-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
