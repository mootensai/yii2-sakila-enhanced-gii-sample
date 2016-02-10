<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByStore */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sales By Store',
]) . ' ' . $model->store;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales By Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->store, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sales-by-store-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
