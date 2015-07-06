<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Empparticipation */

$this->title = $model->event_no;
$this->params['breadcrumbs'][] = ['label' => 'Empparticipations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empparticipation-view">

    <h1><?= Html::encode($this->title) ?>You are out of staff please cncel your Order</h1>

   
    <?
        foreach($model as $cus)
        {

            echo .$cus['name']."  ".$cus['mobile_no']." ".$cus['home_no'];
        }
    ?>

</div>
