<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Treatment;

/**
 * TreatmentSearch represents the model behind the search form about `backend\models\Treatment`.
 */
class TreatmentSearch extends Treatment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_treatment'], 'integer'],
            [['kode_treatment', 'nama_treatment', 'keterangan'], 'safe'],
            [['waktu_treatment', 'komisi_treatment'], 'number'],
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
        $query = Treatment::find();

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
            'id_treatment' => $this->id_treatment,
            'waktu_treatment' => $this->waktu_treatment,
            'komisi_treatment' => $this->komisi_treatment,
        ]);

        $query->andFilterWhere(['like', 'kode_treatment', $this->kode_treatment])
            ->andFilterWhere(['like', 'nama_treatment', $this->nama_treatment])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
