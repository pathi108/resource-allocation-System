<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Empparticipation */

$this->title = $model->event_no;
$this->params['breadcrumbs'][] = ['label' => 'Empparticipations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empparticipation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'event_no' => $model->event_no, 'employee_no' => $model->employee_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'event_no' => $model->event_no, 'employee_no' => $model->employee_no], [
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
            'event_no',
            'employee_no',
            'status',
        ],
    ]) ?>

</div>
