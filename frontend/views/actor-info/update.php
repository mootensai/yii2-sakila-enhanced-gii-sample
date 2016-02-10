<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ActorInfo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Actor Info',
]) . ' ' . $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actor Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="actor-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
