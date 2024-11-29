<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\search\WorkerAvailabilitySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worker-availability-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'worker_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'day_start') ?>

    <?= $form->field($model, 'day_end') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
