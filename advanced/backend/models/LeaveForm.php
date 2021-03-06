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
class LeaveForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $startdate;
    public $enddate;
    public $employeeID;
    

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
        [['employeeID','startdate','enddate'], 'required'],
            [['employeeID'], 'integer'],
            [['startdate','enddate'], 'date','format' => 'yyyy-M-d'],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Emp ID',
            'name' => 'Name',
            'nic' => 'Nic',
            'surname' => 'Surname',
            'basic_salary' => 'Basic Salary',
            'tot_salary' => 'Tot Salary',
            'bonus' => 'Bonus',
            'rating' => 'Rating',
            'address_no' => 'Address No',
            'address_street' => 'Address Street',
            'address_city' => 'Address City',
            'mobile_no' => 'Mobile No',
            'home_no' => 'Home No',
            'email' => 'Email',
        ];
    }
}
