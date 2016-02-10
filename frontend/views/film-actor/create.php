<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FilmActor */

$this->title = Yii::t('app', 'Create Film Actor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-actor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
