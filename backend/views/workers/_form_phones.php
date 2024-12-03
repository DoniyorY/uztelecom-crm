<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$lang = Yii::$app->language;
?>

<?php $form = ActiveForm::begin(['action' => Url::to(['workers/add-phone'])]); ?>
<?= $form->field($model, 'worker_id')->textInput(['value' => $worker_id, 'hidden'=>true])->label(false) ?>
<div class="row">
    <div class="col-md-8">
        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '+999 99 999 99 99'
        ]) ?>
    </div>
    <div class="col-md-4 mt-4">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success w-100']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
