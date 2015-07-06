<?php

namespace frontend\models;
use backend\models\Item;
use frontend\models\Event;

use Yii;

/**
 * This is the model class for table "customer_order".
 *
 * @property integer $order_id
 * @property string $customer_id
 * @property string $status
 * @property double $total_payment
 * @property double $advanced_payment
 */
class CustomerOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */




    public $item_1;
    
    public $qtyItem_1;
    public static function tableName()
    {
        return 'customer_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['total_payment', 'advanced_payment'], 'number'],
            [['advanced_payment'], 'required'],
            [['advanced_payment'], 'checkAdvance'],
            [['customer_id'], 'string', 'max' => 10],
            [['customer_id'], 'required'],
            [['customer_id'], 'validateID'],
            [['item_1'],'required'],
           
           
            [['qtyItem_1'],'required'],
            [['qtyItem_1'],'check'],

            // [['customer_id'], 'validateID'],
           // [['getitem'],'Item::model()->findByPk(1)']


        ];
    }

   
       
       public function validateID($attribute,$params)
       {
          $result = true;
          $nic=$this->customer_id;
          
          if(strlen($nic) <10){
          $result = false;
          }

          $nic_9 = substr($nic,0,9);

         if (!is_numeric ($nic_9)){
          $result =false;
           }

         $nic_v = substr($nic,9,1);
        if (is_numeric ($nic_v)){
          $result =false;
          }

          if($result==false)
          {
            $this->addError($attribute,'Invalid NIC number.');  
          }

       }

     

       public function check($attribute,$params)
       {
              
             

                $data= Yii::$app->db->createCommand("call getCount('$this->item_1')")->queryScalar(); 
                if($this->qtyItem_1>$data)
               {
                  $this->addError($attribute,'sorry no available quantity');
               }
              // else{
                           
                   ///  Yii::$app->db->createCommand("call getItems('$this->qtyItem_1','$this->item_1')")->query(); 
                   // }
               
       }
       public function checkAdvance($attribute,$params)
       {
        if($this->advanced_payment<1000)
            $this->addError($attribute,'sorry you should pay at least RS:1000');  
       }
       

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'customer_id' => 'NIC Number',
            'status' => 'Status',
            'total_payment' => 'Total Payment',
            'advanced_payment' => 'Advanced Payment',
            'qtyItem_1' => 'Quantity',
            'item_1'=> 'Item 1'
        ];
    }


   
}
