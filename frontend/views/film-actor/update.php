<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FilmActor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Film Actor',
]) . ' ' . $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="film-actor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
