<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FilmList */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Film List',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="film-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
