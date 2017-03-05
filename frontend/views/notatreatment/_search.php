<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NotatreatmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notatreatment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_NotaTreatment') ?>

    <?= $form->field($model, 'No_NotaTreatment') ?>

    <?= $form->field($model, 'Tgl_NotaTreatment') ?>

    <?= $form->field($model, 'Total_Rp') ?>

    <?= $form->field($model, 'Keterangan') ?>

    <?php // echo $form->field($model, 'ID_Pasien') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
