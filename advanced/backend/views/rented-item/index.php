<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RentedItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rented Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rented-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rented Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Overdue Items', ['overdue'], ['class' => 'btn btn-danger']) ?>
    </p>

     

    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'filterModel' => $searchModel,
        'showFooter'=>true,
        'showHeader' => true,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_no',
            'event_no',
            'employee_id_responsible',
            'rented_date',
            'due_date',
            'returned_date',
             'status',

            [

            'class' => 'yii\grid\ActionColumn'           
            

            ],


        ],
    ]); ?>

</div>
