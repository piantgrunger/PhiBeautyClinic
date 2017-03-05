<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_pasien".
 *
 * @property integer $ID_Pasien
 * @property string $Kode_Pasien
 * @property string $Nama_Pasien
 * @property string $Alamat_Pasien
 * @property string $Telp_Pasien
 * @property string $Pin_BB
 * @property string $Email
 * @property string $Tgl_Lahir
 * @property string $Jenis_Kelamin
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Kode_Pasien', 'Nama_Pasien', 'Alamat_Pasien', 'Telp_Pasien'], 'required'],
            [['Tgl_Lahir'], 'safe'],
            [['Jenis_Kelamin'], 'string'],
            [['Kode_Pasien', 'Telp_Pasien'], 'string', 'max' => 20],
            [['Nama_Pasien', 'Email'], 'string', 'max' => 50],
            [['Alamat_Pasien'], 'string', 'max' => 100],
            [['Pin_BB'], 'string', 'max' => 10],
            [['Kode_Pasien'], 'unique','message' => 'Kode Pasien Sudah Dipakai' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_Pasien' => 'Id  Pasien',
            'Kode_Pasien' => 'Kode  Pasien',
            'Nama_Pasien' => 'Nama  Pasien',
            'Alamat_Pasien' => 'Alamat  Pasien',
            'Telp_Pasien' => 'Telp  Pasien',
            'Pin_BB' => 'Pin  Bb',
            'Email' => 'Email',
            'Tgl_Lahir' => 'Tgl  Lahir',
            'Jenis_Kelamin' => 'Jenis  Kelamin',
        ];
    }
    
    
}
