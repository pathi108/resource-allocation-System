
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-form">

<?php $form =ActiveForm::begin(); ?>
<?=$form->field($model, 'center_id')->dropDownList($emp, 
         ['prompt'=>'-Choose a Employee-']) ?>
<?= Html::submitButton('Submit',['class'=>'btn btn-success']);?>

</div>