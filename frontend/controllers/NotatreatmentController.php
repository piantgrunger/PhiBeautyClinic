<?php

namespace frontend\controllers;
use yii\db\Query;
use yii\db\Expression;
use \yii\base\DynamicModel;
use Yii;
use backend\models\Notatreatment;
use backend\models\NotatreatmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Pasien;
use yii\helpers\ArrayHelper;
use backend\models\Treatment;
use backend\models\Produk;
use backend\models\VKomisi;
use backend\models\VLaporanRealisasi;
use \mpdf;
use yii\helpers\Json;

/**
 * NotatreatmentController implements the CRUD actions for Notatreatment model.
 */
class NotatreatmentController extends Controller
{
    /**
     * @inheritdoc
     */
   
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Notatreatment models.
     * @return mixed
     */
    public function actionTreatment($id){
    // you may need to check whether the entered ID is valid or not
    $model= Treatment::findOne(['id_treatment'=>$id]);
    return Json::encode([
        'id_treatment'=>$model->id_treatment,
        'Harga_Rp'=>$model->Harga_Rp,
    ]);
}
    public function actionProduk($id){
    // you may need to check whether the entered ID is valid or not
    $model= Produk::findOne(['id_produk'=>$id]);
    return Json::encode([
        'id_produk'=>$model->id_produk,
        'Harga_Rp'=>$model->Harga_Rp,
    ]);
}
    
    public function actionExportpdf($id)
    {
        
           $model = $this->findModel($id);   
    $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
    $file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak    
$handle = fopen($file, 'w');
$condensed = Chr(27) . Chr(33) . Chr(4);
$bold1 = Chr(27) . Chr(69);
$bold0 = Chr(27) . Chr(70);
$initialized = chr(27).chr(64);
$condensed1 = chr(15);
$condensed0 = chr(18);
$Data  = $initialized;
$Data .= "                             Zahra Beauty Center  \n";
$Data .= "                          Jl Raya Kali Rungkut 2B, Surabaya  \n";
$Data .= "                          Telp. 031 8491423 / 0878 1777 8878  \n";
$Data .= "   Tanggal : ".Yii::$app->formatter->asDate($model->Tgl_NotaTreatment,"dd/MM/yyyy")."                                 Pelanggan : ".$model->iDPasien->Nama_Pasien."  \n";
$Data .= "   No Nota : $model->No_NotaTreatment                      Telepon :   ". $model->iDPasien->Telp_Pasien ." \n";
for($i=1;$i<80;$i++)
{  
   $Data .= "-";
}    
$Data .= "\n";
$Data .= "|  Jumlah       |        Jenis Treatment / Produk        | Sub Total       |\n";
for ($i=1;$i<80;$i++)
{  
   $Data .= "-";
}    
$Data .= "\n";
$i=0;
 foreach ($model->detNotatreatments as $detNota)
     {
      
     $Data .= "   ".str_pad($detNota->Jml_Sesi." Sesi",14).str_pad($detNota->idTreatment->nama_treatment,35).str_pad(Yii::$app->formatter->asDecimal($detNota->Harga_Rp,"0"),15," ",STR_PAD_LEFT)."        \n";
     
   $i++;  
 }

 foreach ($model->detNotaproduks as $detNota) 
     {
      
     $Data .= "   ".str_pad($detNota->Qty." ".$detNota->idProduk->Satuan,14).str_pad($detNota->idProduk->nama_produk ." ( @".Yii::$app->formatter->asDecimal($detNota->Harga_Rp,"0"),35).str_pad(Yii::$app->formatter->asDecimal($detNota->Sub_Tot_Rp,"0"),15," ",STR_PAD_LEFT)."        \n";
     
   $i++;  
 }
 /*
 foreach ($model->detNotaproduks as $detNota)
     {
     
$Data .= "   ".detNota->Qty." ".$detNota->idProduk->Satuan."           ".$detNota->idProduk->nama_produk ." ( @".Yii::$app->formatter->asDecimal($detNota->Harga_Rp,"0").""
        . "          ".Yii::$app->formatter->asDecimal($detNota->Sub_Tot_Rp,"0")."        \n";
     
     $i++;
 }
*/
 for($j=$i;$j<=7;$j++)
     {
       $Data .= "\n";
  
     }
for($i=1;$i<80;$i++)
{  
   $Data .= "-";
}
 $Data .= "\n";
 $Data .= $condensed1;

 $Data .= "Keterangan : transaksi yang sudah dibukukan tidak dapat diuangkan kembali \n";
   $Data .="kecuali ditukar dengan treatment produk yang lain \n";
 $Data .= $condensed0;

      $Data .= " ".str_pad("Jumlah :",60," ",STR_PAD_LEFT)  .str_pad(Yii::$app->formatter
             ->asDecimal($model->total_Rp,"0"),15," ",STR_PAD_LEFT)."\n";
      $Data .= " ".str_pad("Discount :",60," ",STR_PAD_LEFT)  .str_pad(Yii::$app->formatter
             ->asDecimal($model->disc_rp,"0"),15," ",STR_PAD_LEFT)."\n";
      $Data .= " ".str_pad("Grand Total :",60," ",STR_PAD_LEFT)  .str_pad(Yii::$app->formatter
             ->asDecimal(($model->total_Rp)-($model->disc_rp),"0"),15," ",STR_PAD_LEFT)."\n";
      $Data .= " ".str_pad("Bayar :",60," ",STR_PAD_LEFT)  .str_pad(Yii::$app->formatter
             ->asDecimal($model->bayar_rp,"0"),15," ",STR_PAD_LEFT)."\n";
      $Data .= " ".str_pad("Sisa :",60," ",STR_PAD_LEFT)  .str_pad(Yii::$app->formatter
             ->asDecimal(($model->total_Rp)-($model->disc_rp)-($model->bayar_rp),"0"),15," ",STR_PAD_LEFT)."\n";
for($i=1;$i<80;$i++)
{  
   $Data .= "-";
}
 $Data .= "\n";
       $Data .= " ".str_pad("Kasir",70," ",STR_PAD_LEFT)  ."\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 $Data .= "\n";
 
 fwrite($handle, $Data);
 
fclose($handle);
copy($file, "//192.168.100.2/EPSONLX310P");  # Lakukan cetak
unlink($file);

         return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
   
        
                
    }        
    
    public function actionIndex()
    {
        $searchModel = new NotatreatmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanrealisasi()
    {
        $filter = new DynamicModel(['tgl_aw','tgl_ak']);
        $filter->addRule(['tgl_aw','tgl_ak'],'required');

            
       $Model = new VLaporanRealisasi();
          
       if (($filter->load(Yii::$app->request->post())) && ($filter->validate()) )      
       {
           $Model->tgl_ak  = $filter->tgl_ak;
           $Model->tgl_aw  = $filter->tgl_aw;
                   $dataProvider = $Model->search(Yii::$app->request->queryParams);
      
                      

           
       }  
       else {
          $filter->tgl_ak= date('Y-m-d');
          $filter->tgl_aw =  date('Y-m-d',strtotime("-1 Months")) ;
          $Model->tgl_ak  = $filter->tgl_ak;
          $Model->tgl_aw  = $filter->tgl_aw;
                  $dataProvider = $Model->search(Yii::$app->request->queryParams);
        

    
        }
        
            return $this->render('laporanrealisasi', [
            'searchModel' => $Model,
            'dataProvider' => $dataProvider,
            'filter' => $filter
       
        ]);
    }

 public function actionLaporankomisi()
    {
        $filter = new DynamicModel(['tgl_aw','tgl_ak']);
        $filter->addRule(['tgl_aw','tgl_ak'],'required');

            
       $Model = new VKomisi();
          
       if (($filter->load(Yii::$app->request->post())) && ($filter->validate()) )      
       {
           $Model->tgl_ak  = $filter->tgl_ak;
           $Model->tgl_aw  = $filter->tgl_aw;
                   $dataProvider = $Model->search(Yii::$app->request->queryParams);
      
                      

           
       }  
       else {
          $filter->tgl_ak= date('Y-m-d');
          $filter->tgl_aw =  date('Y-m-d',strtotime("-1 Months")) ;
          $Model->tgl_ak  = $filter->tgl_ak;
          $Model->tgl_aw  = $filter->tgl_aw;
                  $dataProvider = $Model->search(Yii::$app->request->queryParams);
        

    
        }
        
            return $this->render('laporankomisi', [
            'searchModel' => $Model,
            'dataProvider' => $dataProvider,
            'filter' => $filter
       
        ]);
    }

    /**
     * Displays a single Notatreatment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Notatreatment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notatreatment();
   /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
     */
        if ($model->load(Yii::$app->request->post()))
        {
            $transaction = Yii::$app->db->beginTransaction();
             try{ 
                 $model->detNotaTreatments = Yii::$app->request->post('DetNotatreatment',[]);
                 $model->detNotaProduks = Yii::$app->request->post('DetNotaproduk',[]);
                 
                 if($model->save()){
                     $transaction->commit();
                      return $this->redirect(['view', 'id' => $model->id]);
                 }
                     
                 
             } catch (\Exception $ex) {
               $transaction->rollBack();
               throw  $ex;
           }
            
            
        }else {
            
               $data = ArrayHelper::map(
                    Pasien::find()
            ->select(['ID_Pasien', 'Nama_Pasien' => 'CONCAT(Kode_Pasien," - ",Nama_Pasien," ",Alamat_Pasien)'])
            
            ->all(),'ID_Pasien','Nama_Pasien'
            
            );
 
        $dataTreatment = ArrayHelper::map(
                         Treatment::find()
            ->select(['id_treatment', 'nama_treatment' => 'CONCAT(kode_treatment," - ",nama_treatment)'])
            
            ->all(),'id_treatment','nama_treatment'
            
            );
    
            $dataProduk = ArrayHelper::map(
                         produk::find()
            ->select(['id_produk', 'nama_produk' => 'CONCAT(kode_produk," - ",nama_produk)'])
            ->all(),'id_produk','nama_produk'
            
            );
    
        
         $model->Tgl_NotaTreatment = date('Y-m-d');
         $model->disc_rp =0;
             
            return $this->render('create', [
                'model' => $model,
                'data' => $data,
                'dataTreatment' => $dataTreatment,
                'dataProduk' => $dataProduk,
                
            ]);
        }   
   
    }

    /**
     * Updates an existing Notatreatment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
         
         */
        
           if ($model->load(Yii::$app->request->post()))
        {
            $transaction = Yii::$app->db->beginTransaction();
             try{ 
                 $model->detNotaTreatments = Yii::$app->request->post('DetNotatreatment',[]);
                 $model->detNotaProduks = Yii::$app->request->post('DetNotaproduk',[]);
                 
                 if($model->save()){
                     $transaction->commit();
                     return $this->redirect(['view', 'id' => $model->id]);
                  // return var_dump($model); 
                 }
                     
                 
             } catch (\Exception $ex) {
               $transaction->rollBack();
               throw  $ex;
           }
            
            
        }else {
           $data = ArrayHelper::map(
                    Pasien::find()
            ->select(['ID_Pasien', 'Nama_Pasien' => 'CONCAT(Kode_Pasien," - ",Nama_Pasien," ",Alamat_Pasien)'])
            ->all(),'ID_Pasien','Nama_Pasien'
            
            );
 
        $dataTreatment = ArrayHelper::map(
                         Treatment::find()
            ->select(['id_treatment', 'nama_treatment' => 'CONCAT(kode_treatment," - ",nama_treatment)'])
            ->all(),'id_treatment','nama_treatment'
            
            );
      
        $dataProduk = ArrayHelper::map(
                         produk::find()
            ->select(['id_produk', 'nama_produk' => 'CONCAT(kode_produk," - ",nama_produk)'])
            ->all(),'id_produk','nama_produk'
            
            );
    
      
            return $this->render('update', [
                'model' => $model,
                'data' => $data,
                'dataTreatment' => $dataTreatment,
                'dataProduk' => $dataProduk,
      
                ]);
        }
    }

    /**
     * Deletes an existing Notatreatment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Notatreatment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notatreatment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notatreatment::findone($id)
                
              ) !== null) {
            
            
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
