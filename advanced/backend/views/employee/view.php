<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->emp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->emp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <p><a class="btn btn-lg btn-success home-btn" href="http://localhost/advanced/backend/web/index.php?r=site%2Findex">Home</a></p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_id',
            'name',
            'nic',
            'surname',
            'basic_salary',
            'tot_salary',
            'bonus',
            'rating',
            'address_no',
            'address_street',
            'address_city',
            'mobile_no',
            'home_no',
            'email:email',
        ],
    ]) ?>

</div>
