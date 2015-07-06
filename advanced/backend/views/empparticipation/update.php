<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empparticipation */

$this->title = 'Update Empparticipation: ' . ' ' . $model->event_no;
$this->params['breadcrumbs'][] = ['label' => 'Empparticipations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_no, 'url' => ['view', 'event_no' => $model->event_no, 'employee_no' => $model->employee_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empparticipation-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if($row==null){
        echo "<h1>Leave not Approved</h1>";

      }
      else{
    echo"<table  style=\"border:1px solid CornflowerBlue\">";
     echo"<tr style=\"border:1px solid Aqua\">";
     echo "<td style=\"border:1px solid Aqua;padding: 5px\"> <b> Employee id 	</b></td>";
      echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px;padding: 5px\"><b> Employee name 	</b></td>";
      echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px\"><b> Mobile No 	</b></td>";
     echo"</tr>";
      
      
    	foreach ($row as $key ) {
    		echo "<tr style=\"border:1px solid Aqua;padding: 5px\"><td style=\"border:1px solid Aqua;padding: 5px\"><b>".$key['emp_id']."</b></td><td style=\"border:1px solid Aqua;padding: 5px\"> <b>".$key['name']."</b></td><td style=\"border:1px solid Aqua;padding: 5px\"><b>".$key['mobile_no']."</b></td></tr>"; 
    		
    	}
    }
    	echo"</table>";
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
