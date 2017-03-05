<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_produk".
 *
 * @property integer $id_produk
 * @property string $kode_produk
 * @property string $nama_produk
 * @property string $Satuan
 * @property string $Harga_Rp
 * @property string $Keterangan
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_produk', 'nama_produk', 'Satuan', 'Harga_Rp'], 'required'],
            [['kode_produk', 'Satuan'], 'string', 'max' => 20],
            [['nama_produk'], 'string', 'max' => 100],
            [['Keterangan'], 'string', 'max' => 255],
            [['kode_produk'], 'unique','message' => 'Kode produk Sudah Dipakai'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'kode_produk' => 'Kode Produk',
            'nama_produk' => 'Nama Produk',
            'Satuan' => 'Satuan',
            'Keterangan' => 'Keterangan',
        ];
    }
}
