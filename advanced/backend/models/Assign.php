<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $emp_id
 * @property string $name
 * @property string $nic
 * @property string $surname
 * @property double $basic_salary
 * @property double $tot_salary
 * @property double $bonus
 * @property integer $rating
 * @property string $address_no
 * @property string $address_street
 * @property string $address_city
 * @property string $mobile_no
 * @property string $home_no
 * @property string $email
 */
class Assign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $employee;
    

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
        [['employee'], 'required'],
            ];
    }

    
}
