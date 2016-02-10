<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByFilmCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sales By Film Category',
]) . ' ' . $model->category;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales By Film Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sales-by-film-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
