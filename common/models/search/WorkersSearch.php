<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Workers;

/**
 * WorkersSearch represents the model behind the search form of `common\models\Workers`.
 */
class WorkersSearch extends Workers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'department_id', 'company_id', 'created', 'updated', 'status', 'worker_status_id', 'stavka_id', 'position_id'], 'integer'],
            [['fullname_ru', 'fullname_uz', 'phone', 'birthday', 'passport_series', 'passport_pinfl', 'passport_address', 'passport_end_date', 'address_ru', 'address_uz', 'image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Workers::find();

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
            'department_id' => $this->department_id,
            'company_id' => $this->company_id,
            'birthday' => $this->birthday,
            'passport_end_date' => $this->passport_end_date,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
            'worker_status_id' => $this->worker_status_id,
            'stavka_id' => $this->stavka_id,
            'position_id' => $this->position_id,
        ]);

        $query->andFilterWhere(['like', 'fullname_ru', $this->fullname_ru])
            ->andFilterWhere(['like', 'fullname_uz', $this->fullname_uz])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'passport_series', $this->passport_series])
            ->andFilterWhere(['like', 'passport_pinfl', $this->passport_pinfl])
            ->andFilterWhere(['like', 'passport_address', $this->passport_address])
            ->andFilterWhere(['like', 'address_ru', $this->address_ru])
            ->andFilterWhere(['like', 'address_uz', $this->address_uz])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
