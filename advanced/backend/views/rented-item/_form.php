<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RentedItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rented-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_no')->textInput() ?>

    <?= $form->field($model, 'event_no')->textInput() ?>

    <?= $form->field($model, 'employee_id_responsible')->textInput() ?>

    <?= $form->field($model, 'due_date')->textInput() ?>
    

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
