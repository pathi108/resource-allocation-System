<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Empparticipation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empparticipation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_no')->textInput() ?>

    <?= $form->field($model, 'employee_no')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Finished' => 'Finished', 'Due' => 'Due', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
