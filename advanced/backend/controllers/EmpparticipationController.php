<?php

namespace backend\controllers;

use Yii;
use backend\models\Empparticipation;
use backend\models\EmpparticipationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpparticipationController implements the CRUD actions for Empparticipation model.
 */
class EmpparticipationController extends Controller
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
     * Lists all Empparticipation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpparticipationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empparticipation model.
     * @param integer $event_no
     * @param integer $employee_no
     * @return mixed
     */
    public function actionView($event_no, $employee_no)
    {
        return $this->render('view', [
            'model' => $this->findModel($event_no, $employee_no),
        ]);
    }

    /**
     * Creates a new Empparticipation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Empparticipation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'event_no' => $model->event_no, 'employee_no' => $model->employee_no]);
        } else {
                $connection = Yii::$app->db;
                $command1 = $connection->createCommand("SELECT start_date_time,end_date_time from event where event.event_no=:id");
                $command1->bindParam(":id", $id); 
                $row1 = $command1->queryAll();
                
                
                $command = $connection->createCommand("call Assign3(':Sdate',':Edate')");
               // $command2->bindParam(":id", $id);
                $command->bindParam(":Sdate", $row1['start_date_time']);
                $command->bindParam(":Edate", $row1['end_date_time']);
                $row = $command->queryAll();
                $c=$row;
                if($c!=null){
                $command2 = $connection->createCommand("Update event SET Seen='YES' where event_no=:id"); 
                $command2->bindParam(":id", $id); 
                $command2->execute();
                

            return $this->render('create', [
                'model' => $model,'id'=>$row,
            ]);
        }
                 else 
                {
                $connection = Yii::$app->db;
                $command1 = $connection->createCommand("SELECT name,mobile_no,home_no from customer inner join customer_order where customer.nic=customer_order.customer_id where order_id=:id");
                $command1->bindParam(":id", $id);
                $row1 = $command1->queryAll();

                return $this->render('OutofStaff', [
                'model' => $model,
                ]);
                }
        }
    }

    /**
     * Updates an existing Empparticipation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $event_no
     * @param integer $employee_no
     * @return mixed
     */
    public function actionUpdate($event_no, $employee_no)
    {
        $model = $this->findModel($event_no, $employee_no);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'event_no' => $model->event_no, 'employee_no' => $model->employee_no]);
        } else {
            $connection = Yii::$app->db;
                $command1 = $connection->createCommand("SELECT start_date_time,end_date_time from event where event_no=:id");
                $command1->bindParam(":id", $id);
                $row1 = $command1->queryAll();
                $command = $connection->createCommand("call Assign3(':Sdate',':Edate')");  
                $command->bindParam(":Sdate", $row1['start_date_time']);
                $command->bindParam(":Edate", $row1['end_date_time']);
                $row = $command->queryAll();
            return $this->render('update', [
                'model' => $model,'row'=>$row,
            ]);
        }
    }

    /**
     * Deletes an existing Empparticipation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $event_no
     * @param integer $employee_no
     * @return mixed
     */
    public function actionDelete($event_no, $employee_no)
    {
        $this->findModel($event_no, $employee_no)->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    /**
     * Finds the Empparticipation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $event_no
     * @param integer $employee_no
     * @return Empparticipation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($event_no, $employee_no)
    {
        if (($model = Empparticipation::findOne(['event_no' => $event_no, 'employee_no' => $employee_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
