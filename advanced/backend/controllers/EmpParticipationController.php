<?php

namespace backend\controllers;

use Yii;
use backend\models\EmpParticipation;
use backend\models\EmpParticipationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpParticipationController implements the CRUD actions for EmpParticipation model.
 */
class EmpParticipationController extends Controller
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
     * Lists all EmpParticipation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpParticipationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmpParticipation model.
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
     * Creates a new EmpParticipation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmpParticipation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'event_no' => $model->event_no, 'employee_no' => $model->employee_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmpParticipation model.
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmpParticipation model.
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
     * Finds the EmpParticipation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $event_no
     * @param integer $employee_no
     * @return EmpParticipation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($event_no, $employee_no)
    {
        if (($model = EmpParticipation::findOne(['event_no' => $event_no, 'employee_no' => $employee_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
