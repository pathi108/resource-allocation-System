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
 <h1>Leave Approval</h1>

<?php  
    
    $i=0;
    foreach ($model as $compSub)
    {
      $i=$i+1;
    }
    if($i==0)
        {
          echo"<h3>Leave Approved</h3>";
        }
    else{
    echo"<table  style=\"border:1px solid CornflowerBlue\">";
     echo"<tr style=\"border:1px solid Aqua\">";
     echo "<td style=\"border:1px solid Aqua;padding: 5px\"> <b> Venue   </b></td>";
      echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px;padding: 5px\"><b> Start Date    </b></td>";
      echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px\"><b> End Date     </b></td>";
      echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px\"><b> Type     </b></td>";
      echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px\"><b> Assign    </b></td>";
     echo"</tr>";
        foreach ($model as $compSub)
        {
            echo"<tr style=\"border:1px solid Aqua\">";

            echo "<tr style=\"border:1px solid Aqua\"><td style=\"border:1px solid Aqua;padding: 5px\"><b>".$compSub['venue']."</b></td><td style=\"border:1px solid Aqua;padding: 5px\"> <b>".$compSub['start_date_time']."</b></td><td style=\"border:1px solid Aqua;padding: 5px\"> <b>".$compSub['end_date_time']."</b></td><td style=\"border:1px solid Aqua;padding: 5px\"> <b>".$compSub['type']."</b></td>";
           
            echo "<td style=\"border:1px solid Aqua;padding: 5px;padding: 5px\"><a class=\"btn btn-lg btn-success\" href=\"http://localhost/ras/advanced/backend/web/index.php?r=empparticipation%2Fupdate&event_no=".$compSub['event_no']."&employee_no=".$id."\">Assign</a></br></td></tr>";

        echo"</tr>";
        
        }
       } 


?>

</div>
