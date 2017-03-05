<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Treatment */

$this->title = 'Update Treatment: ' . $model->kode_treatment .' - '. $model->nama_treatment;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Treatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_treatment, 'url' => ['view', 'id' => $model->id_treatment]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treatment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
