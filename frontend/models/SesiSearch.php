<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sesitreatment;

/**
 * SesiSearch represents the model behind the search form about `backend\models\Sesitreatment`.
 */
class SesiSearch extends Sesitreatment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sesitreatment',  'id_d_notatreatment', 'id_karyawan'], 'integer'],
            [['tgl_sesitreatment', 'jam_mulai', 'jam_selesai'], 'safe'],
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
        $query = Sesitreatment::find();

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
            'id_sesitreatment' => $this->id_sesitreatment,
            'tgl_sesitreatment' => $this->tgl_sesitreatment,
            'id_d_notatreatment' => $this->id_d_notatreatment,
            'id_karyawan' => $this->id_karyawan,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai,
        ]);

        $query->orderBy('tgl_sesitreatment desc');
        return $dataProvider;
    }
}
