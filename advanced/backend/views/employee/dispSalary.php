<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

<?php 
echo "<form>" ;
    $i=1;
    //var_dump($model);
    echo "New Salary for ";
    echo $model['name'];
    echo " is Rs. ";
    echo $model['tot_salary'];

       


?>  
</div>