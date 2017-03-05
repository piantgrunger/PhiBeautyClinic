<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\i18n\Formatter;

/* @var $this yii\web\View */
/* @var $model backend\models\Notatreatment */

?>

<style type="text/css">
    /*yang ini buat setting ukuran kertasnya assumsi A4 */
.notatreatment-view{background-color:#FFFFFF;

 
font-family: calibri;
font-size: 12px;
};

*{
font-family: calibri;
font-size: 15px;

}
</style>

<div class="notatreatment-view" > 
    <br>    
    <p align="center"> Zahra Beauty Centre <br>
    Jl.Raya Kali Rungkut 2B,Surabaya<br>
    Telp: 031 8491423 / 0878 1777 8878</p>
    
    
    
  <div class="page1">

      
     <table border='0' width='100%' style="font-size :12px; font-family:calibri;"> <tr><td> Tanggal : <?=Yii::$app->formatter
                          ->asDate($model->Tgl_NotaTreatment,"dd/MM/yyyy");?>
                </td><td align='right'>
                    Pelanggan : <?=$model->iDPasien->Nama_Pasien;?></td></tr>
        </table>
    
    
        <table border='0' width='100%' style="font-size  :12px;font-family:calibri;">
        
        <tr><td> No Nota : <?=$model->No_NotaTreatment;?>
                </td><td align='right'>
                    Telepon : <?=$model->iDPasien->Telp_Pasien;?></td></tr>
        
        </table> 
    
        <table width='100%'  style="font-size:12px;font-family:calibri; border:1px solid black;border-spacing:0;border-collapse: collapse "  >   
            <tr >
                <td width='10%' align='Center' style='border:1px solid black;'> Jumlah</td>
                <td width='60%' align='Center' style='border:1px solid black;'> Jenis Treatment / Produk</td>
                <td width='30%' align='Center' style='border:1px solid black;'> Sub Total</td>
                
                
            </tr>
     <?php
     $i=0;
     foreach ($model->detNotatreatments as $detNota)
     {
        
         echo "  <tr >
                <td  width='10%' align='right' style='border:1px solid black;' > ".$detNota->Jml_Sesi." Sesi  &nbsp;  </td>
                <td width='60%' align='left' style='border:1px solid black;'> &nbsp;".$detNota->idTreatment->nama_treatment ." </td>
                <td width='30%' align='right' style='border:1px solid black;'> ".Yii::$app->formatter
                          ->asDecimal($detNota->Harga_Rp,"0")."&nbsp;</td>
                
                
            </tr>";
         
         
       $i=$i+1;  
     }
     
     foreach ($model->detNotaproduks as $detNota)
     {
        
         echo "  <tr >
                <td border='0' width='10%' align='right' style='border:1px solid black;' > ".$detNota->Qty." ".$detNota->idProduk->Satuan."  &nbsp;  </td>
                <td width='60%' align='left' style='border:1px solid black;'> &nbsp;".$detNota->idProduk->nama_produk ."&nbsp; ( @".Yii::$app->formatter
                          ->asDecimal($detNota->Harga_Rp,"0").") </td>
                <td width='30%' align='right' style='border:1px solid black;'> ".Yii::$app->formatter
                          ->asDecimal($detNota->Sub_Tot_Rp,"0")."&nbsp;</td>
                
                
            </tr>";
         
         
       $i=$i+1;  
     }
     
     for($j=$i;$j<=5;$j++)
     {
       echo "  <tr >
                <td  width='10%' align='right' style='border:1px solid black;'>   &nbsp;  </td>
                <td width='60%' align='left' style='border:1px solid black;'>  &nbsp; </td>
                <td width='30%' align='right' style='border:1px solid black;'>  &nbsp;</td>
                
                
            </tr>";
  
     }
     
     
     ?>
            <tr>
    
                <td colspan='2' style='border:1px solid black;'>
                       <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan : transaksi yang sudah dibukukan tidak dapat diuangkan kembali
                        kecuali ditukar dengan treatment produk yang lain</p>
                    <table style="font-size:12px;font-family:calibri;" border='0' width='100%'>
                        <tr><td></td>
                            <td align='right'>
                     Jumlah :&nbsp;&nbsp;<br>
                     Discount :&nbsp;&nbsp;<br>
                     Grand Total :&nbsp;&nbsp;<br>
                   
                    Bayar :&nbsp;&nbsp;<br>
          Sisa :&nbsp;&nbsp;
                            </td>
                    </table>
                    </td>
            
       <td align='right' style='font-size:12px;font-family:calibri;border:1px solid black;'>
           <br>
           <br>
                          <?=Yii::$app->formatter
             ->asDecimal($model->total_Rp,"0")?> &nbsp;<br>
                     <?=Yii::$app->formatter
             ->asDecimal($model->disc_rp,"0")?> &nbsp;<br>
                    <?=Yii::$app->formatter
             ->asDecimal(($model->total_Rp)-($model->disc_rp),"0")?> &nbsp;<br>
               
                   <?=Yii::$app->formatter
             ->asDecimal($model->bayar_rp,"0")?> &nbsp;<br>
   <?=Yii::$app->formatter
             ->asDecimal(($model->total_Rp)-($model->disc_rp)-($model->bayar_rp),"0")?> &nbsp;<br>
               
</td>
            </tr>
        </table>

      <table style="font-size: 12px;font-family:calibri;" width='100%' border='0'>
             <tr> 
              <td width='70%'>
    <h5></h5>
<h5></h5>
<h5></h5>
<h5></h5>

<h5></h5>
   
              </td>
              <td align='center'>

<h5>Kasir</h5>
              </td>
          </tr>
</table>

    
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
