<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_treatment".
 *
 * @property integer $id_treatment
 * @property string $kode_treatment
 * @property string $nama_treatment
 * @property double $waktu_treatment
 * @property string $keterangan
 * @property string $komisi_treatment
 * @property string $Harga_Rp

 *  */
class Treatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_treatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_treatment', 'nama_treatment', 'Harga_Rp', 'komisi_treatment'], 'required'],
            [['waktu_treatment', 'Harga_Rp'], 'number'],
            [['kode_treatment'], 'string', 'max' => 20],
            [['nama_treatment'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 255],
            [['kode_treatment'], 'unique','message' => 'Kode treatment Sudah Dipakai' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_treatment' => 'Id Treatment',
            'kode_treatment' => 'Kode Treatment',
            'nama_treatment' => 'Jenis Treatment',
            'waktu_treatment' => 'Waktu Treatment (Jam)',
            'keterangan' => 'Keterangan',
            'komisi_treatment' => 'Komisi Treatment',
        ];
    }
}
