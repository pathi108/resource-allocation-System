<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RentedItem */

$this->title = 'Create Rented Item';
$this->params['breadcrumbs'][] = ['label' => 'Rented Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rented-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
