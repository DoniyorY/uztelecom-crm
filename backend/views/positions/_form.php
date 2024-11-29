<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Positions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="positions-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-4">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn w-100 btn-success']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
