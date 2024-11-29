<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Regions::find()->all(), 'id', 'name_ru'),
                'options' => ['placeholder' => 'Выберите регион'],
                'language' => 'ru',
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent'=>'#myModal'
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 mt-4">
            <div class="form-group">
                <?= Html::submitButton('Сохраить', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
