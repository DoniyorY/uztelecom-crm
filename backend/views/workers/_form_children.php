<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<?php $form = ActiveForm::begin(['action' => Url::to(['add-child'])]) ?>
<?= $form->field($model, 'worker_id')->textInput(['hidden' => true, 'value' => $worker_id])->label(false) ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'fullname')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'birthday')->textInput(['type' => 'date']) ?>
        </div>
        <div class="col-md-4 mt-4">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success w-100']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>