<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TbMKas */

$this->title = 'Update Kas Kecil: ' . $model->no_kas;
$this->params['breadcrumbs'][] = ['label' => 'Kas Kecil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_kas, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-mkas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
