<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\WorkerChildren $model */

$this->title = 'Create Worker Children';
$this->params['breadcrumbs'][] = ['label' => 'Worker Childrens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-children-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
