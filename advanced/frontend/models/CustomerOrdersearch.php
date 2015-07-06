<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CustomerOrder;

/**
 * CustomerOrdersearch represents the model behind the search form about `frontend\models\CustomerOrder`.
 */
class CustomerOrdersearch extends CustomerOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'integer'],
            [['order_id'],'required'],
             [['order_id'],'check'],
            [['customer_id'], 'required'],
            [['customer_id'], 'checkID'],
           // [['customer_id'], 'getresult'],

           // [['total_payment', 'advanced_payment'], 'number'],
        ];
    }
      public function check($attribute,$param)
     {
        if($this->order_id<0)
        {
            $this->addError($attribute,'invalid order id'); 
        }
     }


    public function checkID($attribute,$param)
    {
      $data = Yii::$app->db->createCommand("SELECT customer_id FROM customer_order WHERE  order_id=$this->order_id")->queryScalar(); 
      if($data!=$this->customer_id)
      {
        $this->addError($attribute,'No such order related to this NIC Number'); 
      }
    }
      /* public function get()
       {
              $data = Yii::$app->db->createCommand("call getItems('$this->qtyItem_1','$this->item_1')")->query(); 

              print_r($data);
       }*/


     public function attributeLabels()
    {
        return [
            'order_id'=>'Order ID',
            'customer_id' => 'NIC Number',
            ];
     }
    

}