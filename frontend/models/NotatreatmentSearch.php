<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Notatreatment;

/**
 * NotatreatmentSearch represents the model behind the search form about `backend\models\Notatreatment`.
 */
class NotatreatmentSearch extends Notatreatment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ID_Pasien'], 'integer'],
            [['No_NotaTreatment', 'Tgl_NotaTreatment', 'Keterangan','Nama_Pasien'], 'safe'],
            [['Total_Rp'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Notatreatment::find()
                ->select('tb_m_notatreatment.*,tb_Pasien.Nama_Pasien')
                ->leftJoin('tb_Pasien','tb_Pasien.ID_Pasien=tb_m_notatreatment.ID_Pasien');
                                         
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
        $query->andFilterWhere([
            'id' => $this->id,
            'Tgl_NotaTreatment' => $this->Tgl_NotaTreatment,
            'ID_Pasien' => $this->ID_Pasien,
            
        ]);

        $query->andFilterWhere(['like', 'No_NotaTreatment', $this->No_NotaTreatment])
            ->andFilterWhere(['like', 'Keterangan', $this->Keterangan])
->andFilterWhere(['like', 'Nama_Pasien', $this->Nama_Pasien]);
        
        $query->orderBy('Tgl_NotaTreatment desc');
        
        return $dataProvider;
    }
}
