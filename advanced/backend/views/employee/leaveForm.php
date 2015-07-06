<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-form">
<h1>Leave Form</h1>
<?php $form =ActiveForm::begin(); ?>
<?= $form ->field($model,'employeeID')->textInput(); ?>
<?= $form ->field($model,'startdate')->textInput(); ?>
<?= $form ->field($model,'enddate')->textInput(); ?>
<?= Html::submitButton('Submit',['class'=>'btn btn-success']);?>

</div>