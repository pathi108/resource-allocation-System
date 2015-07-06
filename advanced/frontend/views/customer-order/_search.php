<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerOrdersearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-order-search">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'customer_id') ?>

   <!-- <?= $form->field($model, 'status') ?>-->

    <!--<?= $form->field($model, 'total_payment') ?>-->

   <!-- <?= $form->field($model, 'advanced_payment') ?>-->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
      <!--  <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>-->
    </div>

    <?php ActiveForm::end(); ?>

</div>
