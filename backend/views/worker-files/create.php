<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkerFiles $model */

$this->title = 'Create Worker Files';
$this->params['breadcrumbs'][] = ['label' => 'Worker Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-files-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
