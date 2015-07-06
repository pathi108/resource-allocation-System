<?php

namespace backend\controllers;

use Yii;
use backend\models\RentedItem;
use backend\models\RentedItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RentedItemController implements the CRUD actions for RentedItem model.
 */
class RentedItemController extends Controller
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
     * Lists all RentedItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RentedItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RentedItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RentedItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       

        $model = new RentedItem();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->rented_date=date('Y-m-d');
             $model->save();
            return $this->redirect(['view', 'id' => $model->item_no]);
            // return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RentedItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->item_no]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing RentedItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionReturn($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->status != 'Returned') {
            
            $model->status='Returned';
            $model->save();
            return $this->redirect(['view', 'id' => $model->item_no]);
        } else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    public function actionOverdue(){

       /* $command = Yii::$app->db->createCommand("call getOverdueItems()");

    $result = $command->queryAll();
$new_array[] = $row;
    while ($row = mysql_fetch_array($result)) {
    $new_array[$row['item_no']] = $row;
    

   

    $dataProvider = RentedItem::findAll($result);

    foreach ($dataProvider as $data) {
      $temp = array();
              $item_no= $data->item_no;

              $temp['item_no'] = $item_no;              
              $result[] = $temp;
    }
    */
   return $this->render('overdueItems',array());




        //return $this->redirect(['overdueItems']);
       // return $this->render('overdueItems',['result'=>$result]);
    }


    /**
     * Deletes an existing RentedItem model.
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
     * Finds the RentedItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RentedItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RentedItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
