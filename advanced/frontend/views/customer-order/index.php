<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomerOrdersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-order-index">

 

    <h1><?= Html::encode($this->title) ?></h1>
    <?=$this->render('_search', ['model' => $searchModel]); ?>


 

   
   
</div>


