<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $event_no
 * @property string $venue
 * @property string $start_date_time
 * @property string $end_date_time
 * @property string $type
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['venue', 'type'], 'required'],
            [['start_date_time', 'end_date_time'], 'safe'],
            [['venue'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_no' => 'Event No',
            'venue' => 'Venue',
            'start_date_time' => 'Start Date Time',
            'end_date_time' => 'End Date Time',
            'type' => 'Type',
        ];
    }
}
