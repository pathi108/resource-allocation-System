<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "emp_participation".
 *
 * @property integer $event_no
 * @property integer $employee_no
 * @property string $status
 */
class EmpParticipation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_participation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_no', 'employee_no'], 'required'],
            [['event_no', 'employee_no'], 'integer'],
            [['status'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_no' => 'Event No',
            'employee_no' => 'Employee No',
            'status' => 'Status',
        ];
    }
}
