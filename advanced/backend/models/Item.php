<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $item_no
 * @property integer $max_life_time
 * @property integer $current_life_time
 * @property string $status
 * @property double $hourly_price
 * @property string $model
 * @property string $manufaturer
 * @property string $type
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['max_life_time', 'current_life_time', 'hourly_price', 'model', 'manufaturer', 'type'], 'required'],
            [['max_life_time'], 'number'],
            [['current_life_time', 'hourly_price'], 'number'],
            [['status'], 'string'],
            [['model'], 'string', 'max' => 25],
            [['manufaturer'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_no' => 'Item No',
            'max_life_time' => 'Max Life Time',
            'current_life_time' => 'Current Life Time',
            'status' => 'Status',
            'hourly_price' => 'Hourly Price',
            'model' => 'Model',
            'manufaturer' => 'Manufaturer',
            'type' => 'Category',
        ];
    }
}
