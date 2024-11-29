<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkerStatus $model */

$this->title = 'Create Worker Status';
$this->params['breadcrumbs'][] = ['label' => 'Worker Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
