<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Treatment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_treatment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_treatment')->textInput(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'komisi_treatment')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'Harga_Rp')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
