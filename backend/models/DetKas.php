<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_d_kas".
 *
 * @property integer $id_d_kas
 * @property integer $id_m_kas
 * @property string $ket
 * @property double $debet_rp
 * @property double $kredit_rp
 *
 * @property TbMKas $idMKas
 */
class DetKas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_d_kas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'ket'], 'required'],
            
            [['debet_rp', 'kredit_rp'], 'number'],
            [['ket'], 'string', 'max' => 200],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_d_kas' => 'Id D Kas',
            'id_m_kas' => 'Id M Kas',
            'ket' => 'Ket',
            'debet_rp' => 'Debet Rp',
            'kredit_rp' => 'Kredit Rp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMKas()
    {
        return $this->hasOne(TbMKas::className(), ['id' => 'id_m_kas']);
    }
}
