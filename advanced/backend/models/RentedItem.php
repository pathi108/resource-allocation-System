<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rented_item".
 *
 * @property integer $item_no
 * @property integer $event_no
 * @property integer $employee_id_responsible
 * @property string $due_date
 * @property string $returned_date
 * @property string $status
 */
class RentedItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rented_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_no', 'event_no', 'employee_id_responsible', 'due_date'], 'required'],
            [['item_no', 'event_no', 'employee_id_responsible'], 'integer'],
            [['due_date', 'returned_date','rented_date'], 'safe'],
            [['status'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_no' => 'Item No',
            'event_no' => 'Event No',
            'employee_id_responsible' => 'Employee Id Responsible',
            'rented_date' => 'Rented Date',
            'due_date' => 'Due Date',
            'returned_date' => 'Returned Date',
            'status' => 'Status',
        ];
    }
}
