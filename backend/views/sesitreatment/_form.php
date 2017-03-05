<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Sesitreatment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesitreatment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_sesitreatment')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>true,
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
    
]);?>
 
    
    <?= $form->field($model, 'id_d_notatreatment')->widget(Select2::classname(), [
                                'data' => $dataNotaTreatment,
                                'options' => [
                                        'placeholder' => 'Pilih Nota Treatment ...',
                                        'onchange'=>'
                                                $.post( "'.Url::to(['Notatreatment']).'?id="+$(this).val(), function( data ) {
                                                  $( "input#Treatment" ).val( data + " ");
                                                  $( "input#Treatment" ).focus();
                                                });
                                        '
                                ],
                                'pluginOptions' => [
                                        'allowClear' => true,
                                ],
                        ])->label('Treatment'); ?>

    <?= $form->field($model, 'id_karyawan')->widget(Select2::classname(), [
                                'data' => $dataKaryawan,
                                'options' => [
                                        'placeholder' => 'Pilih Terapis ...',
                                        'onchange'=>'
                                                $.post( "'.Url::to(['karyawan']).'?id="+$(this).val(), function( data ) {
                                                  $( "input#nama_karyawan" ).val( data + " ");
                                                  $( "input#nama_karyawan" ).focus();
                                                });
                                        '
                                ],
                                'pluginOptions' => [
                                        'allowClear' => true,
                                ],
                        ])->label('Terapis'); ?>

    <?= $form->field($model, 'jam_mulai')->textInput() ?>

    <?= $form->field($model, 'jam_selesai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
