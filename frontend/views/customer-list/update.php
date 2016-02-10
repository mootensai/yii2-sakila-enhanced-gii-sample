<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerList */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Customer List',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customer-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
