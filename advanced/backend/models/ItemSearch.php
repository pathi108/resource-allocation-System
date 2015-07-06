<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Item;

/**
 * ItemSearch represents the model behind the search form about `backend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_no', 'max_life_time'], 'integer'],
            [['current_life_time', 'hourly_price'], 'number'],
            [['status', 'model', 'manufaturer', 'type'], 'safe'],
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
        $query = Item::find();

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
            'max_life_time' => $this->max_life_time,
            'current_life_time' => $this->current_life_time,
            'hourly_price' => $this->hourly_price,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'manufaturer', $this->manufaturer])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
