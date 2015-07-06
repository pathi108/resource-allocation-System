<?php

namespace backend\controllers;

use Yii;
use backend\models\Employee;
use backend\models\LeaveForm;
use backend\models\Assign;
use backend\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;


use backend\models\Salary;
use backend\models\Update2;
use backend\models\Resign;
use backend\models\ShowSalary;
use backend\models\AddBasicSalary;
use backend\models\PaySalary;
//use backend\models\Employee;
//use backend\models\EmployeeSearch;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
  public $emp=" ";  
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionCheck($id)
    {
        $connection = Yii::$app->db;
                $command1 = $connection->createCommand("SELECT employee_no from emp_participation  where event_no=:id");
                $command1->bindParam(":id", $id);
                $row1 = $command1->queryAll();
            $i=5;
                foreach($row1 as $r){
                $i=$r['employee_no'];
            }
        return $this->render('view', [
            'model' =>$this->findModel($i),
        ]);
    
    }
    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->emp_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->emp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    public function actionTest()
    {
        $model = new LeaveForm;
       // $model2= new Assign;
        if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                $ID=$model->employeeID;
                $Sdate=$model->startdate;
                $Edate=$model->enddate;
                $connection = Yii::$app->db;
                $command = $connection->createCommand("SELECT * FROM (SELECT * FROM emp_participation NATURAL JOIN event WHERE emp_participation.event_no = event.event_no AND STATUS =  'Due' AND employee_no= :ID) as V where start_date_time between :Sdate and :Edate or end_date_time between :Sdate and :Edate or :Sdate between start_date_time and end_date_time");  
                $command->bindParam(":Sdate", $Sdate);
                $command->bindParam(":Edate", $Edate);
                $command->bindParam(":ID", $ID);
                $row = $command->queryAll(); 
               // $command2=$connection->createCommand();
                

               //Yii::$app->runController('employee/assign');
               return $this->render('Tets',['model'=>$row,'id'=>$ID,]);
            }else{

               return $this->render('leaveForm', [
                'model' => $model,
            ]);
            }
     /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
       
    }
    public function actionAssign($id){
       $model=new Assign;

    if($model->load(Yii::$app->request->post()) && $model->validate())
          {
                
           return $this->render('Confrim');
           }else{
                $connection = Yii::$app->db;
                $command1 = $connection->createCommand("SELECT start_date_time,end_date_time from event where event_no=:id");
                $command1->bindParam(":id", $id);
                $row1 = $command1->queryAll();

                $command = $connection->createCommand("call Assign2(':Sdate',':Edate')");  
                $command->bindParam(":Sdate", $row1['start_date_time']);
                $command->bindParam(":Edate", $row1['end_date_time']);
                $row = $command->queryAll();

             return $this->render('Assign',['model' => $model,'emp'=>$row]
            );
           }
        
    }
    public function accessRules()
{
  return array(
    array('allow',
          'actions'=>array('ajaxrequest'),
          'users'=>array('@'),
    ),
    // ...
    array('deny',  // deny all users
          'users'=>array('*'),
    ),
  );
}
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	/********************ayoma************************************************************************************/
	public function actionResign()
    {
         $model = new Resign();
       
         if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                $emp_id=$model->emp_id;
                
                $connection = Yii::$app->db;
                $command = $connection->createCommand("CALL `resignEmp`(:emp_id)");  
                 
                $command->bindParam(":emp_id", $emp_id);
                
                $row = $command->queryOne(); 
                return $this->render('resign2',['model'=>$row,]);
            }else{

               return $this->render('resign', [
                'model' => $model,
            ]);
            }
    }
	
	public function actionPaySalary()
    {
         $model = new PaySalary();
       
         if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                
                $emp_id=$model->emp_id;
                $amnt=$model->amnt;
                $connection = Yii::$app->db;
                $command = $connection->createCommand("CALL `paySalary`(:emp_id,:amnt)");  
                 
                $command->bindParam(":emp_id", $emp_id);
                $command->bindParam(":amnt", $amnt);
                
                $row = $command->queryOne(); 
                return $this->render('paySal2',['model'=>$row,]);
            }else{

               return $this->render('paySalary', [
                'model' => $model,
            ]);
            }
    }
	
	public function actionAddBasicSalary()
    {
         $model = new AddBasicSalary();
       
         if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                $emp_id=$model->emp_id;
                
                $connection = Yii::$app->db;
                $command = $connection->createCommand("CALL `addBasic`(:emp_id)");  
                 
                $command->bindParam(":emp_id", $emp_id);
                
                $row = $command->queryOne(); 
                return $this->render('showSal2',['model'=>$row,]);
            }else{

               return $this->render('addBasicSalary', [
                'model' => $model,
            ]);
            }
    }
	
	 public function actionShowSalary()
    {
         $model = new ShowSalary();
       
         if($model->load(Yii::$app->request->post()) && $model->validate())
            {
                $emp_id=$model->emp_id;
                
                $connection = Yii::$app->db;
                $command = $connection->createCommand("CALL `getSalary`(:emp_id)");  
                 
                $command->bindParam(":emp_id", $emp_id);
                
                $row = $command->queryOne(); 
                return $this->render('showSal2',['model'=>$row,]);
            }else{

               return $this->render('showSalary', [
                'model' => $model,
            ]);
            }
    }
	 public function actionSalary()
    {
         $model = new Salary();
       // $model2= new Assign;
         if($model->load(Yii::$app->request->post()) && $model->validate())
            {
               // $emp_id=$model->emp_id;
                $event_no=$model->event_no;
                $connection = Yii::$app->db;
                $command = $connection->createCommand("CALL `calSalary`(:event_no)");  
                //$command = $connection->createCommand("SELECT bonus FROM `employee` WHERE emp_id = :emp_id");  
                //$command->bindParam(":emp_id", $emp_id);
                $command->bindParam(":event_no", $event_no);
                $row = $command->queryOne(); 
                return $this->render('dispSalary',['model'=>$row,]);
            }else{

               return $this->render('salary', [
                'model' => $model,
            ]);
            }
    }
	
}
