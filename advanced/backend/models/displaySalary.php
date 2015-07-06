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
    
        foreach ($model as $compSub)
        {
            
            echo "<br/>".$compSub['bonus']." ";
            //$date=$compSub['start_date_time']+" "+$compSub['end_date_time'];
           //echo "<input type=\"submit\" id=\"demo\" onclick=\"showUser($date)\">" ;
           // echo "<p type=\"emp\"></p>"
          }


?>  
</div>
