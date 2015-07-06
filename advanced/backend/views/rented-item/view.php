<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RentedItem */

$this->title = $model->item_no;
$this->params['breadcrumbs'][] = ['label' => 'Rented Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rented-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->item_no], ['class' => 'btn btn-primary']) ?>
         <?= Html::a('Return', ['return', 'id' => $model->item_no], ['class' => 'btn btn-success']) ?>
          

        <?= Html::a('Delete', ['delete', 'id' => $model->item_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'item_no',
            'event_no',
            'employee_id_responsible',
            'rented_date',
            'due_date',
            'returned_date',
            'status',
        ],
    ]) ?>

</div>




