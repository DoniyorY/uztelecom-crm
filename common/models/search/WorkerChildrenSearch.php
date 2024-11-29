<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WorkerChildren;

/**
 * WorkerChildrenSearch represents the model behind the search form of `common\models\WorkerChildren`.
 */
class WorkerChildrenSearch extends WorkerChildren
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'worker_id', 'birthday', 'created', 'status'], 'integer'],
            [['fullname'], 'safe'],
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
        $query = WorkerChildren::find();

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
            'worker_id' => $this->worker_id,
            'birthday' => $this->birthday,
            'created' => $this->created,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname]);

        return $dataProvider;
    }
}
