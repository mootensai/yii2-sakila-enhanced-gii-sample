<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Actor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Actor',
]) . ' ' . $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'id' => $model->actor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="actor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
