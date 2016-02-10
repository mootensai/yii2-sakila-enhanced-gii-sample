<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Rental */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Rental',
]) . ' ' . $model->rental_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rentals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rental_id, 'url' => ['view', 'id' => $model->rental_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
