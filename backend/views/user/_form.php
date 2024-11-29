<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?=$form->field($model,'role_id')->dropDownList(Yii::$app->params['user_role'],['prompt'=>'Выберите роль'])?>
        </div>
        <div class="col-md-12">
            <?=$form->field($model,'fullname')->textInput()?>
        </div>
        <div class="col-md-12">
            <?=$form->field($model,'username')->textInput()?>
        </div>
        <div class="col-md-12">
            <?=$form->field($model,'phone')->textInput()?>
        </div>
        <div class="col-md-12">
            <?=$form->field($model,'password_hash')->passwordInput()?>
        </div>
        <div class="col-md-12 mt-4">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'w-100 btn btn-success']) ?>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
