<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkerAvailability $model */

$this->title = 'Create Worker Availability';
$this->params['breadcrumbs'][] = ['label' => 'Worker Availabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-availability-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
