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
class AddBasicSalary extends \yii\db\ActiveRecord
{
    public $emp_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id'], 'required'],
            [['emp_id'], 'number'],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Emp ID',
               ];
    }
}
