<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

$this->title = 'Update Event: ' . ' ' . $model->event_no;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_no, 'url' => ['view', 'id' => $model->event_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
