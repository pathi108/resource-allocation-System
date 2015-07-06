<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerOrder */

$this->title = 'Update Customer Order: ' . ' ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateform', [
        'model' => $model,
        'event' =>$event,
    ]) ?>

</div>
