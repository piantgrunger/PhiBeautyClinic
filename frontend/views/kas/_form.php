<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\widgets\GridInput;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model backend\models\TbMKas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-mkas-form">

    <?php $form = ActiveForm::begin(); ?>


     <?= $form->field($model, 'tgl_kas')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>true,
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
     ]);
        ?>
   
            <?=
        GridInput::widget([
            'allModels' => $model->detKases,
            'model' => \backend\models\DetKas::className(),
            'form' => $form,
            'columns' => [
                ['class' => 'mdm\widgets\SerialColumn'],
               
                'ket',
                'debet_rp',
                'kredit_rp',
               
                ['class' => 'mdm\widgets\ButtonColumn']
            ],
            'hiddens'=>[
                'id_m_kas'
            ]
        ])
        ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
