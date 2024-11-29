<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\search\WorkersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'fullname_ru') ?>

    <?= $form->field($model, 'fullname_uz') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'passport_series') ?>

    <?php // echo $form->field($model, 'passport_pinfl') ?>

    <?php // echo $form->field($model, 'passport_address') ?>

    <?php // echo $form->field($model, 'passport_end_date') ?>

    <?php // echo $form->field($model, 'address_ru') ?>

    <?php // echo $form->field($model, 'address_uz') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'worker_status_id') ?>

    <?php // echo $form->field($model, 'stavka_id') ?>

    <?php // echo $form->field($model, 'position_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
