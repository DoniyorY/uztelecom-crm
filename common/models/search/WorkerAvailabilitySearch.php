<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WorkerAvailability;

/**
 * WorkerAvailabilitySearch represents the model behind the search form of `common\models\WorkerAvailability`.
 */
class WorkerAvailabilitySearch extends WorkerAvailability
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'worker_id', 'type_id', 'day_start', 'day_end', 'created'], 'integer'],
            [['content', 'image'], 'safe'],
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
        $query = WorkerAvailability::find();

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
            'type_id' => $this->type_id,
            'day_start' => $this->day_start,
            'day_end' => $this->day_end,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
