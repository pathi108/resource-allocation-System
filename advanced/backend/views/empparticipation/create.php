<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Empparticipation */

$this->title = 'Create Empparticipation';
$this->params['breadcrumbs'][] = ['label' => 'Empparticipations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empparticipation-create">
<?php
foreach ($id as $compSub)
        {
            
            echo "<br/>".$compSub['emp_id']." ".$compSub['name']."   ".$compSub['mobile_no']."    "; 
        }
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
