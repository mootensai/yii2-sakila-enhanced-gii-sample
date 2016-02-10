<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Country */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Country',
]) . ' ' . $model->country;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
