<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FilmCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Film Category',
]) . ' ' . $model->film_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->film_id, 'url' => ['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="film-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
