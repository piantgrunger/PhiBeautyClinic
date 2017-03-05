<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_Pasien') ?>

    <?= $form->field($model, 'Kode_Pasien') ?>

    <?= $form->field($model, 'Nama_Pasien') ?>

    <?= $form->field($model, 'Alamat_Pasien') ?>

    <?= $form->field($model, 'Telp_Pasien') ?>

    <?php // echo $form->field($model, 'Pin_BB') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Tgl_Lahir') ?>

    <?php // echo $form->field($model, 'Jenis_Kelamin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
