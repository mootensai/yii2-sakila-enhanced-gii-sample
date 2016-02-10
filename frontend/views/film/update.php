<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Film */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Film',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Films'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->film_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="film-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
