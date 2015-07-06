<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CustomerOrder;
use frontend\models\Event;
use frontend\models\Update;
use frontend\models\CustomerSearch;
use frontend\models\CustomerOrdersearch;
use frontend\models\Ordersearch;
use backend\models\RentedItem;
use backend\models\Item;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * CustomerOrderController implements the CRUD actions for CustomerOrder model.
 */
class CustomerOrderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CustomerOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerOrdersearch();


        if ($searchModel->load(Yii::$app->request->post() ) &&$searchModel->validate() ) {
            
                return $this->redirect(['view', 'id' => $searchModel->order_id]);
       } else {
             return $this->render('index', [
            'searchModel' => $searchModel,]);
       }
        
     
    }

    
    public function actionView($id)
    {
       
       // $event= new Event();
        
       

        return $this->render('view', [
            'model' => $this->findModel($id),
            'event'=> $this->findEvent($id),
        ]);
    }

    /**
     * Creates a new CustomerOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerOrder();
        $event=new Event();
        // $event -> event_no = $model -> order_id;
         $data=Yii::$app->db->createCommand("call getLastID()")->queryScalar();
        if($data==null)
        {
             $event->event_no= 1;
        }
        else
        {
           $event->event_no= $data +1;   
        }

        if ($model->load(Yii::$app->request->post()) && $model->save() &&$event->load(Yii::$app->request->post()) && $event->save()) {
            $ary= Yii::$app->db->createCommand("call getItems('$model->qtyItem_1','$model->item_1')")->queryAll();

               
                for ($x = 0; $x <sizeof($ary); $x++) {
                     $item_no=ArrayHelper::getValue($ary[$x], 'item_no');
                    
                    
                 Yii::$app->db->createCommand("call insertRentedItem('$item_no','$event->event_no','$event->start_date_time','$event->end_date_time')")->query();
                 Yii::$app->db->createCommand("call updateStatus('$item_no')")->query();
                } 
                 
            
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'event' => $event,
            ]);
        }
    }

    /**
     * Updates an existing CustomerOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findUmodel($id);
        $event= $this->findEvent($id);
      
        if ($model->load(Yii::$app->request->post()) && $model->save()&& $event->load(Yii::$app->request->post()) && $event->save()) {

                
                    
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'event'=>$event,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
         $this->findEvent($id)->delete();

        return $this->redirect(['index']);
    }

     
    


   
    /**
     * Finds the CustomerOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CustomerOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
 protected function findEvent($id)
    {
        if (($event = Event::findOne($id)) !== null) {
            return $event;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

 protected function findUmodel($id)
    {
        if (($umodel= Update::findOne($id)) !== null) {
            return $umodel;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    


}
