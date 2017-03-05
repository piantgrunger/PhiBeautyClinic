<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_d_notaproduk".
 *
 * @property integer $id_d_NotaProduk
 * @property integer $id_NotaTreatment
 * @property integer $id_Produk
 * @property integer $Qty
 * @property integer $Sub_Tot_Rp
 *  * @property double $Harga_Rp
 *
 * @property TbProduk $idProduk
 * @property TbMNotatreatment $idNotaTreatment
 */
class DetNotaproduk extends \yii\db\ActiveRecord
{
    public $Produk;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_d_notaproduk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'id_produk', 'Qty','Sub_Tot_Rp', 'Harga_Rp'], 'required'],
            [['id_produk', 'Qty'], 'integer'],
            [['Harga_Rp','Sub_Tot_Rp'], 'number'],
            [['Qty'],  'default' ,'value'=>'0' ],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_NotaTreatment' => 'Id  Nota Treatment',
            'id_produk' => 'Produk',
            'Qty' => 'Qty',
            'Sub_Tot_Rp' => 'Sub Total Rp',
            
            'Harga_Rp' => 'Harga  Rp',
          
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNotaTreatment()
    {
        return $this->hasOne(Notatreatment::className(), ['id' => 'id_NotaTreatment']);
    }
}
