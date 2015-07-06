<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerOrder */

$this->title = 'Create Customer Order';
//$this->title = 'Create Customer Order: ' . ' ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'event' =>$event,
    ]) ?>

</div>
