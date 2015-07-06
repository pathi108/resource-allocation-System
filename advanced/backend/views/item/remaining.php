
   <?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->params['breadcrumbs'][] = ['label' => 'Item', 'url' => ['index']];
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

		$sql = "select item_no,type,manufaturer,model,getLifeTime(max_life_time,current_life_time) as remainingLIfeTime from item";
		$result = mysqli_query($conn, $sql);

		



		

		for($i=0;$i<mysqli_num_rows($result);$i++){
		    
		    $row = mysqli_fetch_assoc($result);
 	
		        echo "<br/>item: " . $row["item_no"]."<br>". $row["type"]." ".$row["manufaturer"]." ".$row["model"]."<br>Apr. Remaining Life Time :".$row["remainingLIfeTime"]."<br>";
		    
		} 	

		mysqli_close($conn);     
        

?>  

</div>

   