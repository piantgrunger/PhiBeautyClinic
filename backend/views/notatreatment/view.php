<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\i18n\Formatter;

/* @var $this yii\web\View */
/* @var $model backend\models\Notatreatment */

$this->title = $model->No_NotaTreatment;
$this->params['breadcrumbs'][] = ['label' => 'Datar Nota treatment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('Cetak',['exportpdf','id' => $model->id], ['class' => 'btn btn-primary']);?>

<div class="notatreatment-view">
  
    <h5> <center><?= Html::encode('Zahra Beauty Centre' ) ?><br>
    <?= Html::encode('Jl.Raya Kali Rungkut 2B,Surabaya' ) ?><br>
    <?= Html::encode('Telp: 031 8491423 / 0878 1777 8878' ) ?></center></h5>
    
    <h5> <table border='0' width='100%'> <tr><td> Tanggal : <?=Yii::$app->formatter
                          ->asDate($model->Tgl_NotaTreatment,"dd/MM/yyyy");?>
                </td><td align='right'>
                    Pelanggan : <?=$model->iDPasien->Nama_Pasien;?></td></tr>
        </table>
    </h5>
    <h5>
        <table border='0' width='100%'>
        
        <tr><td> No Nota : <?=$model->No_NotaTreatment;?>
                </td><td align='right'>
                    Telepon : <?=$model->iDPasien->Telp_Pasien;?></td></tr>
        
        </table> 
    
    </h5>
    
  <div class="page1">
    <h5>
        <table width='100%' border='1' border-spacing="0"  >   
            <tr>
                <td width='10%' align='Center' border='1px solid #ccc'> Jumlah</td>
                <td width='60%' align='Center' border='1px solid #ccc'> Jenis Treatment/ Produk</td>
                <td width='30%' align='Center' border='1px solid #ccc'> Sub Total</td>
                
                
            </tr>
     <?php
     $i=0;
     foreach ($model->detNotatreatments as $detNota)
     {
        
         echo "  <tr >
                <td border='0' width='10%' align='right' border='1px solid #ccc' > ".$detNota->Jml_Sesi." Sesi  &nbsp;  </td>
                <td width='60%' align='left' border='1px solid #ccc'> &nbsp;".$detNota->idTreatment->nama_treatment ." </td>
                <td width='30%' align='right' border='1px solid #ccc'> ".Yii::$app->formatter
                          ->asDecimal($detNota->Harga_Rp,"0")."&nbsp;</td>
                
                
            </tr>";
         
         
       $i=$i+1;  
     }
    
     foreach ($model->detNotaproduks as $detNota)
     {
        
         echo "  <tr >
                <td border='0' width='10%' align='right' border='1px solid #ccc' > ".$detNota->Qty." ".$detNota->idProduk->Satuan."  &nbsp;  </td>
                <td width='60%' align='left' border='1px solid #ccc'> &nbsp;".$detNota->idProduk->nama_produk ."&nbsp; ( @".Yii::$app->formatter
                          ->asDecimal($detNota->Harga_Rp,"0").") </td>
                <td width='30%' align='right' border='1px solid #ccc'> ".Yii::$app->formatter
                          ->asDecimal($detNota->Sub_Tot_Rp,"0")."&nbsp;</td>
                
                
            </tr>";
         
         
       $i=$i+1;  
     }
     
     for($j=$i;$j<=10;$j++)
     {
       echo "  <tr >
                <td border='0' width='10%' align='right' border='1px solid #ccc'>   &nbsp;  </td>
                <td width='60%' align='left' border='1px solid #ccc'>  &nbsp; </td>
                <td width='30%' align='right' border='1px solid #ccc'>  &nbsp;</td>
                
                
            </tr>";
  
     }
     
     
     ?>
            <tr>
    
                <td colspan='2' >
                    <h6> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan : transaksi yang sudah dibukukan tidak dapat diuangkan kembali
                        kecuali ditukar dengan treatment produk yang lain</h6>
                    <h5 ><p align='right'> Jumlah :&nbsp;&nbsp;<p></h5>
                    <h5 ><p align='right'> Discount :&nbsp;&nbsp;<p></h5>
                    <h5 ><p align='right'> Grand Total :&nbsp;&nbsp;<p></h5>
                   
                    <h5 ><p align='right'> Bayar :&nbsp;&nbsp;<p></h5>
                    <h5 ><p align='right'> Sisa :&nbsp;&nbsp;<p></h5>
                    
                    </td>
            
       <td align='right'>
                    <h6>&nbsp;&nbsp;  </h6>
                    <h5 ><p align='right'>      <?=Yii::$app->formatter
             ->asDecimal($model->total_Rp,"0")?> &nbsp;<p></h5>
                    <h5 ><p align='right'> <?=Yii::$app->formatter
             ->asDecimal($model->disc_rp,"0")?> &nbsp;<p></h5>
                    <h5 ><p align='right'> <?=Yii::$app->formatter
             ->asDecimal(($model->total_Rp)-($model->disc_rp),"0")?> &nbsp;<p></h5>
               
                    <h5 ><p align='right'> <?=Yii::$app->formatter
             ->asDecimal($model->bayar_rp,"0")?> &nbsp;<p></h5>
                    <h5 ><p align='right'> <?=Yii::$app->formatter
             ->asDecimal(($model->total_Rp)-($model->disc_rp) -($model->bayar_rp),"0")?> &nbsp;<p></h5>
             
</td>
            </tr>
        </table>
      </h5>  
    
    

    
    <?php
     
    
    /*GridView::widget([
        'dataProvider'=>new yii\data\ActiveDataProvider([
            'query'=>$model->getDetNotaTreatments(),
            'pagination'=>false
        ]),
        'columns'=>[
            'idTreatment.nama_treatment:text:Treatment',
            'Jml_Sesi',
            'Sesi_Terpakai',
               'Harga_Rp',
      
        ]
    ]) */?>

</div>
