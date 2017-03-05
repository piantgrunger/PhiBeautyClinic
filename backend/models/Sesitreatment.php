<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_sesitreatment".
 *
 * @property integer $id_sesitreatment
 * @property string $tgl_sesitreatment
 * @property integer $id_pasien
 * @property integer $id_d_notatreatment
 * @property integer $id_karyawan
 * @property string $jam_mulai
 * @property string $jam_selesai
 *
 * @property TbPasien $idPasien
 * @property TbDNotatreatment $idDNotatreatment
 * @property TbKaryawan $idKaryawan
 */
class Sesitreatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_sesitreatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_sesitreatment',  'id_d_notatreatment', 'id_karyawan', 'jam_mulai', 'jam_selesai'], 'required'],
            [['tgl_sesitreatment', 'jam_mulai', 'jam_selesai','no_urut'], 'safe'],
            [[ 'id_d_notatreatment', 'id_karyawan'], 'integer'],
            [['id_d_notatreatment'], 'exist', 'skipOnError' => true, 'targetClass' => DetNotatreatment::className(), 'targetAttribute' => ['id_d_notatreatment' => 'id_d_NotaTreatment']],
            [['id_karyawan'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['id_karyawan' => 'id_karyawan']],

            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sesitreatment' => 'Id Sesitreatment',
            'tgl_sesitreatment' => 'Tgl Sesi Treatment',
            'id_d_notatreatment' => 'Id D Notatreatment',
            'id_karyawan' => 'Id Karyawan',
            'jam_mulai' => 'Jam Mulai',
            'jam_selesai' => 'Jam Selesai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDNotatreatment()
    {
        return $this->hasOne(DetNotatreatment::className(), ['id_d_NotaTreatment' => 'id_d_notatreatment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['id_karyawan' => 'id_karyawan']);
    }
}
