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
class Employee extends \yii\db\ActiveRecord
{
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
            [['name', 'nic', 'surname', 'basic_salary', 'address_no', 'address_city'], 'required'],
            [['basic_salary', 'tot_salary', 'bonus'], 'number'],
            [['rating'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 30],
            [['nic', 'address_no', 'address_city', 'mobile_no', 'home_no'], 'string', 'max' => 10],
            [['address_street'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_id' => 'Employee ID',
            'name' => 'Name',
            'nic' => 'NIC Number',
            'surname' => 'Surname',
            'basic_salary' => 'Basic Salary',
            'tot_salary' => 'Total Salary',
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
