<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */

$this->title = $model->type.' - '.$model->manufaturer.' '.$model->model ;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->item_no], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('Discard', ['discard', 'id' => $model->item_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to discard this item?',
                'method' => 'post',
            ],
        ])

        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'item_no',
            'type',
            'model',
            'manufaturer',            
            'max_life_time',
            'current_life_time',
            'status',
            'hourly_price',
            
        ],
    ]) ?>

</div>
