<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RentedItem;

/**
 * RentedItemSearch represents the model behind the search form about `backend\models\RentedItem`.
 */
class RentedItemSearch extends RentedItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_no', 'event_no', 'employee_id_responsible'], 'integer'],
            [['rented_date','due_date', 'returned_date', 'status'], 'safe'],
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
        $query = RentedItem::find();

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
            'item_no' => $this->item_no,
            'event_no' => $this->event_no,
            'employee_id_responsible' => $this->employee_id_responsible,
            'due_date' => $this->due_date,
            'returned_date' => $this->returned_date,
            'rented_date' => $this->rented_date,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
