<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FilmText */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Film Text',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->film_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="film-text-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
