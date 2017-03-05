<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

use kartik\select2\Select2;
use yii\helpers\Url;
use mdm\widgets\GridInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Notatreatment */
/* @var $form yii\widgets\ActiveForm */


$js=" 
 $(document).on('change','.form-control',function(){
        var id = $(this).attr('id');
 
  if (id==='detnotatreatment-0-id_treatment')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/treatment")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotatreatment-0-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }


  if (id==='detnotatreatment-1-id_treatment')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/treatment")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotatreatment-1-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }
  
  if (id==='detnotatreatment-2-id_treatment')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/treatment")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotatreatment-2-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }
  
  if (id==='detnotatreatment-3-id_treatment')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/treatment")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotatreatment-3-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }
  
  if (id==='detnotatreatment-4-id_treatment')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/treatment")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotatreatment-4-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }
  
  if (id==='detnotaproduk-0-id_produk')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/produk")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotaproduk-0-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }

  if (id==='detnotaproduk-1-id_produk')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/produk")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotaproduk-1-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }
  
  if (id==='detnotaproduk-2-id_produk')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/produk")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotaproduk-2-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }

  if (id==='detnotaproduk-3-id_produk')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/produk")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotaproduk-3-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }
  
  if (id==='detnotaproduk-4-id_produk')
  {    
    $.ajax({
        url: '".Url::toRoute("notatreatment/produk")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#detnotaproduk-4-harga_rp').val(data.Harga_Rp);
      
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
  }




});

$('#btn_hitung').on('click', function(){
     var total=0;
     if (typeof $('#detnotatreatment-0-harga_rp').val() !== 'undefined') 
       total =total+ parseFloat($('#detnotatreatment-0-harga_rp').val());
       if (typeof $('#detnotatreatment-1-harga_rp').val() !== 'undefined') 
       total = total+ parseFloat($('#detnotatreatment-1-harga_rp').val());
       if (typeof $('#detnotatreatment-2-harga_rp').val() !== 'undefined') 
       total = total+ parseFloat($('#detnotatreatment-2-harga_rp').val());
       if (typeof $('#detnotatreatment-3-harga_rp').val() !== 'undefined') 
       total = total+ parseFloat($('#detnotatreatment-3-harga_rp').val());
       if (typeof $('#detnotatreatment-4-harga_rp').val() !== 'undefined') 
       total= total+ parseFloat($('#detnotatreatment-4-harga_rp').val());
       

        
     if (typeof $('#detnotaproduk-0-qty').val() !== 'undefined')
     $('#detnotaproduk-0-sub_tot_rp').val( parseFloat($('#detnotaproduk-0-harga_rp').val())* parseFloat($('#detnotaproduk-0-qty').val()));
     if (typeof $('#detnotaproduk-1-qty').val() !== 'undefined')
     $('#detnotaproduk-1-sub_tot_rp').val( parseFloat($('#detnotaproduk-1-harga_rp').val())* parseFloat($('#detnotaproduk-1-qty').val()));
     if (typeof $('#detnotaproduk-2-qty').val() !== 'undefined')
     $('#detnotaproduk-2-sub_tot_rp').val( parseFloat($('#detnotaproduk-2-harga_rp').val())* parseFloat($('#detnotaproduk-2-qty').val()));
     if (typeof $('#detnotaproduk-3-qty').val() !== 'undefined')
     $('#detnotaproduk-3-sub_tot_rp').val( parseFloat($('#detnotaproduk-3-harga_rp').val())* parseFloat($('#detnotaproduk-3-qty').val()));
     if (typeof $('#detnotaproduk-4-qty').val() !== 'undefined')
      $('#detnotaproduk-4-sub_tot_rp').val( parseFloat($('#detnotaproduk-4-harga_rp').val())* parseFloat($('#detnotaproduk-4-qty').val()));
     
       
       if (typeof $('#detnotaproduk-0-sub_tot_rp').val() !== 'undefined') 
       total =total+ parseFloat($('#detnotaproduk-0-sub_tot_rp').val());
       if (typeof $('#detnotaproduk-1-sub_tot_rp').val() !== 'undefined') 
       total = total+ parseFloat($('#detnotaproduk-1-sub_tot_rp').val());
       if (typeof $('#detnotaproduk-2-sub_tot_rp').val() !== 'undefined') 
       total = total+ parseFloat($('#detnotaproduk-2-sub_tot_rp').val());
       if (typeof $('#detnotaproduk-3-sub_tot_rp').val() !== 'undefined') 
       total = total+ parseFloat($('#detnotaproduk-3-sub_tot_rp').val());
       if (typeof $('#detnotaproduk-4-sub_tot_rp').val() !== 'undefined') 
       total= total+ parseFloat($('#detnotaproduk-4-sub_tot_rp').val());

       total= total- parseFloat($('#notatreatment-disc_rp').val());
       
    $('#notatreatment-totalafterdisc_rp').val(total);
})";
        
        

$this->registerJs($js);





        
?>

<div class="notatreatment-form">

    <?php $form = ActiveForm::begin(); ?>
<?php
            
  
    ?>
    <?= $form->field($model, 'Tgl_NotaTreatment')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>true,
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
     ]);
        ?>


   
 
    <?= $form->field($model, 'ID_Pasien')->widget(Select2::classname(), [
                                'data' => $data,
                                'options' => [
                                        'placeholder' => 'Pilih  Pasien ...',
                                        'onchange'=>'
                                                $.post( "'.Url::to(['Pasien']).'?id="+$(this).val(), function( data ) {
                                                  $( "input#Nama_Pasien" ).val( data + " ");
                                                  $( "input#Nama_Pasien" ).focus();
                                                });
                                        '
                                ],
                                'pluginOptions' => [
                                        'allowClear' => true,
                                ],
                        ])->label('Pasien'); ?>



    
       <div class="form-group">
           
        <?=
        GridInput::widget([
            'allModels' => $model->detNotatreatments,
            'model' => \backend\models\DetNotaTreatment::className(),
            'form' => $form,
            'columns' => [
                ['class' => 'mdm\widgets\SerialColumn'],
                 [
                    'attribute' => 'id_Treatment',
                    'items' => $dataTreatment,
                 ],    
               
                'Jml_Sesi',
                'Harga_Rp',
                'Sesi_Terpakai',
               
                ['class' => 'mdm\widgets\ButtonColumn']
            ],
            'hiddens'=>[
                'id_NotaTreatment'
            ]
        ])
        ?>
    </div>
 <div class="form-group">
           
        <?=
        GridInput::widget([
            'allModels' => $model->detNotaproduks,
            'model' => \backend\models\DetNotaproduk::className(),
            'form' => $form,
            'columns' => [
                ['class' => 'mdm\widgets\SerialColumn'],
                 [
                    'attribute' => 'id_produk',
                    'items' => $dataProduk,
                 ],    
               
                'Qty',
                'Harga_Rp',
                'Sub_Tot_Rp',
               
                ['class' => 'mdm\widgets\ButtonColumn']
            ],
            'hiddens'=>[
                'id_NotaTreatment'
            ]
        ])
        ?>
    </div>

       <div class="form-group">
    <?= $form->field($model, 'disc_rp')->textInput()->label('Discount'); ?>

   <?= Html::Button('Hitung', ['class' => 'btn btn-primary','id'=>'btn_hitung'
       
       ]) ?>
 

   <?= $form->field($model, 'totalAfterDisc_Rp')->textInput(['readonly'=>true])->label('Total'); ?>
     
   <?= $form->field($model, 'bayar_rp')->textInput()->label('Bayar') ?>

       </div>    


    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
