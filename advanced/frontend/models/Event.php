<?php

namespace frontend\models;

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
            [[ 'venue', 'type'], 'required'],
            [['event_no'], 'integer'],
         //   [['event_no'], 'insertdata'],
            [['start_date_time', 'end_date_time'], 'safe'],
            [['start_date_time'],'validateSDate'],
             [['end_date_time'],'validateEDate'],
            [['venue'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */


 public function validateSDate($attribute,$params)
      {
        date_Default_timezone_set('Asia/Colombo');
        $dt =Date('Y-m-d h:i:s');
        
        if (strtotime($dt) > strtotime($this->start_date_time))
        {
            $this->addError($attribute,'Invalid date'); 
        }
       
      }

     public function validateEDate($attribute,$params)
      {
        date_Default_timezone_set('Asia/Colombo');
        $dt =Date('Y-m-d h:i:s');
        
        if (strtotime($this->end_date_time) < strtotime($this->start_date_time))
        {
            $this->addError($attribute,'Invalid date'); 
        }
       
      }  
  
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
