<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkerAvailability $model */

$this->title = 'Update Worker Availability: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Worker Availabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worker-availability-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
