<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "v_komisi".
 *
 * @property string $tgl_sesitreatment
 * @property string $kode_karyawan
 * @property string $nama_karyawan
 * @property string $nama_treatment
 * @property string $komisi_treatment
 */
class VKomisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $tgl_aw;
    public $tgl_ak;
    
    public static function tableName()
    {
        return 'v_komisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tgl_sesitreatment' => 'Tgl Sesitreatment',
            'kode_karyawan' => 'Kode Karyawan',
            'nama_karyawan' => 'Nama Karyawan',
            'nama_treatment' => 'Nama Treatment',
            'komisi_treatment' => 'Komisi Treatment',
        ];
    }

     public function search($params)
    {
        $query = VKomisi::find();

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
->andFilterWhere(['>=', 'tgl_sesitreatment',$this->tgl_aw,]) 
->andFilterWhere(['<=', 'tgl_sesitreatment',$this->tgl_ak,]); 


        $query->select(['nama_karyawan','sum(komisi_treatment) as komisi_treatment'])
                ->groupBy(['nama_karyawan']);
                

        return $dataProvider;
    }
}
    
