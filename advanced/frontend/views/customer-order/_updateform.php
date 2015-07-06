<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use backend\models\Item;
/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput(['readonly' => true]) ?>

   <!-- <?= $form->field($model, 'status')->textInput(['maxlength' => 10]) ?>-->

   <!-- <?= $form->field($model, 'total_payment')->textInput() ?>-->

  <?= $form->field($event, 'venue')->textInput(['maxlength' => 100]) ?>

  
    <?= $form->field($event, 'start_date_time')->widget(DateTimePicker::className(), [
            'language' => 'english',
          //  'size' => 'ms',
           // 'template' => '{input}',
            'pickButtonIcon' => 'glyphicon glyphicon-time',
            'inline' => false,
            'clientOptions' => [
               // 'startView' => 1,
                //'minView' => 0,
                //'maxView' => 1,
                'autoclose' => true,
                'linkFormat' => 'HH:ii P', // if inline = true
                // 'format' => 'HH:ii P', // if inline = false
                'todayBtn' => false
            ]
        ]);?>


   
    <?= $form->field($event, 'end_date_time')->widget(DateTimePicker::className(), [
            'language' => 'english',
          //  'size' => 'ms',
           // 'template' => '{input}',
            'pickButtonIcon' => 'glyphicon glyphicon-time',
            'inline' => false,
            'clientOptions' => [
               // 'startView' => 1,
                //'minView' => 0,
                //'maxView' => 1,
                'autoclose' => true,
                'linkFormat' => 'HH:ii P', // if inline = true
                // 'format' => 'HH:ii P', // if inline = false
                'todayBtn' => false
            ]
        ]);?>

     <?= $form->field($event, 'type')->dropDownList([ 'Wedding' => 'Wedding', 'Party' => 'Party', 'Meeting' => 'Meeting', 'Other' => 'Other',], ['prompt' => '']) ?>
   








 <!--   <?= $form->field($model, 'advanced_payment')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
