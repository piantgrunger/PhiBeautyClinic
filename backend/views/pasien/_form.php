<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 

/* @var $this yii\web\View */
/* @var $model backend\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kode_Pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nama_Pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alamat_Pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telp_Pasien')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
