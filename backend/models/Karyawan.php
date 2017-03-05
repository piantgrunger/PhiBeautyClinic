<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_karyawan".
 *
 * @property integer $id_karyawan
 * @property string $kode_karyawan
 * @property string $nama_karyawan
 * @property string $alamat_karyawan
 * @property string $telp_karyawan
 * @property string $tgl_lahir
 * @property string $keterangan
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_karyawan', 'nama_karyawan', 'alamat_karyawan',
                'telp_karyawan'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['keterangan'], 'string'],
            [['kode_karyawan', 'telp_karyawan'], 'string', 'max' => 20],
            [['nama_karyawan'], 'string', 'max' => 50],
            [['alamat_karyawan'], 'string', 'max' => 100],
            [['kode_karyawan'], 'unique','message' => 'Kode karyawan Sudah Dipakai' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karyawan' => 'Id Karyawan',
            'kode_karyawan' => 'Kode Karyawan',
            'nama_karyawan' => 'Nama Karyawan',
            'alamat_karyawan' => 'Alamat Karyawan',
            'telp_karyawan' => 'Telp Karyawan',
            'tgl_lahir' => 'Tgl Lahir',
            'keterangan' => 'Keterangan',
        ];
    }
}
