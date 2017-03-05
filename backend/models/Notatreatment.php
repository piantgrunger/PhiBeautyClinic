<?php

namespace backend\models;

use Yii;
use backend\models\Pasien;
use mdm\autonumber\AutoNumber;
/**
 * This is the model class for table "tb_m_notatreatment".
 *
 * @property integer $id
 * @property string $No_NotaTreatment
 * @property string $Tgl_NotaTreatment
 * @property double $Total_Rp
 * @property string $Keterangan
 * @property integer $ID_Pasien
 * @property double $bayar_rp
 * @property double $disc_rp
 *
 * @property TbPasien $iDPasien
 */
class Notatreatment extends \yii\db\ActiveRecord
{
  use \mdm\behaviors\ar\RelationTrait;
    /**
     * @inheritdoc
     */
    public  $Nama_Pasien;


    public static function tableName()
    {
        return 'tb_m_notatreatment';
    }
    public function behaviors()
{
    return [
        [
            'class' => 'mdm\autonumber\Behavior',
            'attribute' => 'No_NotaTreatment', // required
            'group' =>'Nota',
            'value' => 'Nota/'.date('m/Y').'/?' , // format auto number. '?' will be replaced with generated number
            'digit' => 4 // optional, default to null. 
        ],
       
    ];
}
 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'Tgl_NotaTreatment', 'disc_rp','bayar_rp', 'ID_Pasien'], 'required'],
        //    [['No_NotaTreatment'], 'autonumber', 'format'=>'Nota/'.date('m/Y').'/?', 'digit'=>4],
            [['Tgl_NotaTreatment'], 'safe'],
            [['ID_Pasien'], 'integer'],
            [['disc_rp','bayar_rp'], 'double'],
            
            [['No_NotaTreatment'], 'string', 'max' => 20],
            [['Keterangan'], 'string', 'max' => 255],
            [['No_NotaTreatment'], 'unique'],
            [['ID_Pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['ID_Pasien' => 'ID_Pasien']],
        ];
    }

    /**
     * @inheritdoc
     */
    
    public function attributeLabels()
    {
        return [
            'id' => 'Id  Nota Treatment',
            'No_NotaTreatment' => 'No  Nota Treatment',
            'Tgl_NotaTreatment' => 'Tgl  Nota Treatment',
            'Keterangan' => 'Keterangan',
            'ID_Pasien' => 'Id  Pasien',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPasien()
    {
        return $this->hasOne(Pasien::className(), ['ID_Pasien' => 'ID_Pasien']);
    }
    
    
    public function getDetNotatreatments()
    {
        return $this->hasMany(DetNotatreatment::classname(), ['id_NotaTreatment'=>'id']);
    
    }        
  
    public function getDetNotaproduks()
    {
        return $this->hasMany(DetNotaproduk::classname(), ['id_NotaTreatment'=>'id']);
    
    }        
  
    public function  setDetNotatreatments($value)
    {
        $this->loadRelated('detNotatreatments',$value);
    
    }
   
    public function  setDetNotaproduks($value)
    {
        $this->loadRelated('detNotaproduks',$value);
    
    }
   
    public function getTotal_Rp()
    {
        $x=0;    
        if ($this->isNewRecord) {
            return $x; // This avoid calling a query searching for null primary keys.
        }
        
          foreach($this->detNotatreatments as $detail)
          {
              $x=$x+$detail->Harga_Rp;
          }    
     
           foreach($this->detNotaproduks as $detail)
          {
              $x=$x+$detail->Sub_Tot_Rp;
          }    
     
        return $x;
    }
    
    public function getTotalAfterDisc_Rp()
    {
        $x=0;    
        if ($this->isNewRecord) {
            return $x; // This avoid calling a query searching for null primary keys.
        }
        
          foreach($this->detNotatreatments as $detail)
          {
              $x=$x+$detail->Harga_Rp;
          }    
        
             foreach($this->detNotaproduks as $detail)
          {
              $x=$x+$detail->Sub_Tot_Rp;
          }    
     
        return $x-$this->disc_rp;
    }
    
}
