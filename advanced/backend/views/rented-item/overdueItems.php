
   <?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->params['breadcrumbs'][] = ['label' => 'Rented Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

<?php  
    
    $i;
        
           
           
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "rasdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

		$sql = "call getOverdueItems()";
		$result = mysqli_query($conn, $sql);

		



		

		for($i=0;$i<mysqli_num_rows($result);$i++){
		    
		    $row = mysqli_fetch_assoc($result);
 	
		        echo "<br/>item: " . $row["item_no"]."<br>Due_date :". $row["due_date"]."<br>Employee responsible :".$row["employee_id_responsible"]."<br>Rented Date :".$row["rented_date"]."<br>";
		    
		} 	

		mysqli_close($conn);     
        

?>  

</div>

   