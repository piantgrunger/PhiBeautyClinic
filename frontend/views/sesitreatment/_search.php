<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SesiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesitreatment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sesitreatment') ?>

    <?= $form->field($model, 'tgl_sesitreatment') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'id_d_notatreatment') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?php // echo $form->field($model, 'jam_mulai') ?>

    <?php // echo $form->field($model, 'jam_selesai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
