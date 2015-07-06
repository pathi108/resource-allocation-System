<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Event;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerOrder */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
      
        'attributes' => [
        'order_id',
        'customer_id',
        'status',
         'total_payment',
        'advanced_payment',
             
        ],
        
    ]) ?>
 


      <div class="row">
       
    <?= "Venue = $event->venue"?></br>
    <?= "Start Date and Time = $event->start_date_time"?><br>
      <?= "End Date and Time = $event->end_date_time"?><br>
      <?= "Type of the event = $event->type"?><br>
  </div>

    
   
   
</div>
