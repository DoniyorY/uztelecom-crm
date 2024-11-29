<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Workers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-4">
            <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Departments::find()->all(), 'id', 'name_ru'),
                'options' => ['placeholder' => 'Выберите отдел ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\Company::find()->all(), 'id', 'name_ru'),
                'options' => ['placeholder' => 'Выберите филиал ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'position_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\common\models\Positions::find()->all(), 'id', 'name_ru'),
                'options' => ['placeholder' => 'Выберите должность ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <hr class="mt-4">
        <div class="col-md-6">
            <?= $form->field($model, 'fullname_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'fullname_uz')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'passport_series')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'passport_pinfl')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'passport_address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'passport_end_date')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'birthday')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md-4 mt-4">
            <?= $form->field($model, 'imageFile')->fileInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 mt-3">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
    </div>




    <?php ActiveForm::end(); ?>

</div>
