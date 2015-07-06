<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_no') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'manufacturer') ?>


    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'hourly_price') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'manufaturer') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
