<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\WorkerStatus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worker-status-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'value')->textInput(['maxlength' => true, 'value' => $last_value->value + 1]) ?>
        </div>
        <div class="col-md-3 mt-4">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn w-100 btn-success']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
