<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Staff */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Staff',
]) . ' ' . $model->staff_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->staff_id, 'url' => ['view', 'id' => $model->staff_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
