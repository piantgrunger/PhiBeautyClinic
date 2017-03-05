<?php

namespace frontend\controllers;

use Yii;
use backend\models\Sesitreatment;
use backend\models\SesiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\models\Pasien;
use backend\models\DetNotatreatment;
use backend\models\Karyawan;
/**
 * SesitreatmentController implements the CRUD actions for Sesitreatment model.
 */
class SesitreatmentController extends Controller
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
     * Lists all Sesitreatment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SesiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sesitreatment model.
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
     * Creates a new Sesitreatment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sesitreatment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sesitreatment]);
        } else {
               $data = ArrayHelper::map(
                    Pasien::find()
            ->select(['ID_Pasien', 'Nama_Pasien' => 'CONCAT(Kode_Pasien," - ",Nama_Pasien)'])
            ->all(),'ID_Pasien','Nama_Pasien'
            
            );
 
            $dataNotaTreatment = ArrayHelper::map(
             DetNotatreatment::find()
            ->select(['id_d_NotaTreatment', 'Treatment' => 'CONCAT(No_NotaTreatment," - ",nama_treatment," - ",Nama_Pasien ," ( Sisa : ",Jml_Sesi-Sesi_Terpakai ," Sesi )" )'])
             ->from('tb_d_notatreatment d')
             ->leftJoin('tb_m_notatreatment m','m.id=d.id_NotaTreatment')
             ->leftJoin('tb_pasien p','p.ID_Pasien=m.Id_Pasien')
               ->leftJoin('tb_treatment t','t.id_treatment=d.Id_treatment')
             ->where('Jml_Sesi-Sesi_Terpakai>0 ')
                    ->all(),'id_d_NotaTreatment','Treatment'
            
            );

                  $dataKaryawan = ArrayHelper::map(
                                  Karyawan::find()
            ->select(['id_karyawan', 'nama_karyawan' => 'CONCAT(kode_karyawan," - ",nama_karyawan)'])
            ->all(),'id_karyawan','nama_karyawan'
            
            ); 
               
                     $model->tgl_sesitreatment = date('Y-m-d');
      
            return $this->render('create', [
                'model' => $model,
                'data' => $data,
                'dataNotaTreatment'=>$dataNotaTreatment,
                'dataKaryawan' => $dataKaryawan,
            ]);

        }
    }

    /**
     * Updates an existing Sesitreatment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sesitreatment]);
        } else {
              $data = ArrayHelper::map(
                    Pasien::find()
            ->select(['ID_Pasien', 'Nama_Pasien' => 'CONCAT(Kode_Pasien," - ",Nama_Pasien)'])
            ->all(),'ID_Pasien','Nama_Pasien'
            
            );
 
            $dataNotaTreatment = ArrayHelper::map(
             DetNotatreatment::find()
            ->select(['id_d_NotaTreatment', 'Treatment' => 'CONCAT(No_NotaTreatment," - ",nama_treatment," - ",Nama_Pasien ," ( Sisa : ",Jml_Sesi-Sesi_Terpakai ," Sesi )" )'])
             ->from('tb_d_notatreatment d')
             ->leftJoin('tb_m_notatreatment m','m.id=d.id_NotaTreatment')
             ->leftJoin('tb_pasien p','p.ID_Pasien=m.Id_Pasien')
               ->leftJoin('tb_treatment t','t.id_treatment=d.Id_treatment')
             ->where('Jml_Sesi-Sesi_Terpakai>0 or id_d_NotaTreatment='.$model->id_d_notatreatment)
              ->all(),'id_d_NotaTreatment','Treatment'
            
            );

                  $dataKaryawan = ArrayHelper::map(
                                  Karyawan::find()
            ->select(['id_karyawan', 'nama_karyawan' => 'CONCAT(kode_karyawan," - ",nama_karyawan)'])
            ->all(),'id_karyawan','nama_karyawan'
            
            ); 
               
            return $this->render('update', [
                'model' => $model,
                'data' => $data,
                'dataNotaTreatment'=>$dataNotaTreatment,
                'dataKaryawan' => $dataKaryawan,
            ]);
        }
    }

    /**
     * Deletes an existing Sesitreatment model.
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
     * Finds the Sesitreatment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sesitreatment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sesitreatment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
