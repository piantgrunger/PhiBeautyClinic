<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pasien;

/**
 * PasienSearch represents the model behind the search form about `backend\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Pasien'], 'integer'],
            [['Kode_Pasien', 'Nama_Pasien', 'Alamat_Pasien', 'Telp_Pasien', 'Pin_BB', 'Email', 'Tgl_Lahir', 'Jenis_Kelamin'], 'safe'],
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
        $query = Pasien::find();

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
            'ID_Pasien' => $this->ID_Pasien,
            'Tgl_Lahir' => $this->Tgl_Lahir,
        ]);

        $query->andFilterWhere(['like', 'Kode_Pasien', $this->Kode_Pasien])
            ->andFilterWhere(['like', 'Nama_Pasien', $this->Nama_Pasien])
            ->andFilterWhere(['like', 'Alamat_Pasien', $this->Alamat_Pasien])
            ->andFilterWhere(['like', 'Telp_Pasien', $this->Telp_Pasien])
            ->andFilterWhere(['like', 'Pin_BB', $this->Pin_BB])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Jenis_Kelamin', $this->Jenis_Kelamin]);

        return $dataProvider;
    }
}
