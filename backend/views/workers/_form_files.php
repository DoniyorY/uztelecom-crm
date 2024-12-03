<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$lang = Yii::$app->language;
?>

<?php $form = ActiveForm::begin(['action' => Url::to(['workers/add-file'])]); ?>
<?= $form->field($model, 'worker_id')->textInput(['value' => $worker_id, 'hidden' => true])->label(false) ?>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'name_uz')->textInput() ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'name_ru')->textInput() ?>
    </div>
    <div class="col-md-3 mt-4">
        <?= $form->field($model, 'imageFile')->fileInput() ?>
    </div>
    <div class="col-md-3 mt-4">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success w-100']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
