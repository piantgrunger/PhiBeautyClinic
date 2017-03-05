<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_d_notatreatment".
 *
 * @property integer $id_d_NotaTreatment
 * @property integer $id_NotaTreatment
 * @property integer $id_Treatment
 * @property integer $Jml_Sesi
 * @property integer $Sesi_Terpakai
 *  * @property double $Harga_Rp
 *
 * @property TbTreatment $idTreatment
 * @property TbMNotatreatment $idNotaTreatment
 */
class DetNotatreatment extends \yii\db\ActiveRecord
{
    public $Treatment;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_d_notatreatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'id_Treatment', 'Jml_Sesi', 'Harga_Rp'], 'required'],
            [['id_Treatment', 'Jml_Sesi','Sesi_Terpakai'], 'integer'],
            [['Harga_Rp'], 'number'],
            [['Sesi_Terpakai'],  'default' ,'value'=>'0' ],
            [['id_Treatment'], 'exist', 'skipOnError' => true, 'targetClass' => Treatment::className(), 'targetAttribute' => ['id_Treatment' => 'id_treatment']],
          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_d_NotaTreatment' => 'Id D  Nota Treatment',
            'id_NotaTreatment' => 'Id  Nota Treatment',
            'id_Treatment' => 'Treatment',
            'Jml_Sesi' => 'Jml  Sesi',
            'Harga_Rp' => 'Harga  Rp',
            'Sesi_Terpakai' => 'Sesi  Terpakai',
            
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTreatment()
    {
        return $this->hasOne(Treatment::className(), ['id_treatment' => 'id_Treatment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaTreatment()
    {
        return $this->hasOne(Notatreatment::className(), ['id' => 'id_NotaTreatment']);
    }
}
