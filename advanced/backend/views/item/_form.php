<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => 10]) ?>

     <?= $form->field($model, 'manufaturer')->textInput(['maxlength' => 30]) ?>

     <?= $form->field($model, 'model')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'max_life_time')->textInput() ?>

    <?= $form->field($model, 'current_life_time')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Discarded' => 'Discarded', 'Available' => 'Available', 'Out' => 'Out', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hourly_price')->textInput() ?>

    

   

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
