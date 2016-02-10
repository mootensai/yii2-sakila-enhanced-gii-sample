<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FilmText */

$this->title = Yii::t('app', 'Create Film Text');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
