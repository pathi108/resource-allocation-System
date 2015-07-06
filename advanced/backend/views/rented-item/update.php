<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RentedItem */

$this->title = 'Update Rented Item: ' . ' ' . $model->item_no;
$this->params['breadcrumbs'][] = ['label' => 'Rented Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_no, 'url' => ['view', 'id' => $model->item_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rented-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
