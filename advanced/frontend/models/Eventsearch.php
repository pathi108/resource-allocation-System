<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Event;

/**
 * Eventsearch represents the model behind the search form about `frontend\models\Event`.
 */
class Eventsearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_no'], 'integer'],
            [['venue', 'start_date_time', 'end_date_time', 'type'], 'safe'],
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
        $query = Event::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'event_no' => $this->event_no,
            'start_date_time' => $this->start_date_time,
            'end_date_time' => $this->end_date_time,
        ]);

        $query->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
