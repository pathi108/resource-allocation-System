<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emp_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nic') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'basic_salary') ?>

    <?php // echo $form->field($model, 'tot_salary') ?>

    <?php // echo $form->field($model, 'bonus') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'address_no') ?>

    <?php // echo $form->field($model, 'address_street') ?>

    <?php // echo $form->field($model, 'address_city') ?>

    <?php // echo $form->field($model, 'mobile_no') ?>

    <?php // echo $form->field($model, 'home_no') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
