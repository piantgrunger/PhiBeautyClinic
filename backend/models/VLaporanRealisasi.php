<?php

namespace backend\models;
use yii\data\ActiveDataProvider;

use Yii;

/**
 * This is the model class for table "v_laporan_realisasi".
 *
 * @property string $No_NotaTreatment
 * @property string $Tgl_NotaTreatment
 * @property string $nama_treatment
 * @property string $Nama_Pasien
 * @property string $alamat_pasien
 * 
 * @property string $sesi1
 * @property string $sesi2
 * @property string $sesi3
 * @property string $sesi4
 * @property string $sesi5
 * @property string $sesi6
 * @property string $sesi7
 * @property string $sesi8
 * @property string $sesi9
 * @property string $sesi10
 * @property string $Jml_Sesi
 * @property string $Sisa_sesi
 * 
 */
class VLaporanRealisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $tgl_aw;
    public $tgl_ak;




    public static function tableName()
    {
        return 'v_laporan_realisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_aw', 'tgl_ak'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'No_NotaTreatment' => 'No  Nota Treatment',
            'Tgl_NotaTreatment' => 'Tgl  Nota Treatment',
            'nama_treatment' => 'Nama Treatment',
            'Nama_Pasien' => 'Nama  Pasien',
            'alamat_pasien' => 'Alamat  Pasien',
            
            'Jml_Sesi' => 'Jml Sesi',
            'Sisa_sesi'=> 'Sisa Sesi',
            'sesi1' => 'Sesi1',
            'sesi2' => 'Sesi2',
            'sesi3' => 'Sesi3',
            'sesi4' => 'Sesi4',
            'sesi5' => 'Sesi5',
            'sesi6' => 'Sesi6',
            'sesi7' => 'Sesi7',
            'sesi8' => 'Sesi8',
            'sesi9' => 'Sesi9',
            'sesi10' => 'Sesi10',
        ];
    }
    
     public function search($params)
    {
        $query = VLaporanRealisasi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query
->andFilterWhere(['>=', 'Tgl_NotaTreatment',$this->tgl_aw,]) 
->andFilterWhere(['<=', 'Tgl_NotaTreatment',$this->tgl_ak,]); 

 

        return $dataProvider;
    }
}
