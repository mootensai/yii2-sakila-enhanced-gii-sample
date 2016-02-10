<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FilmCategory */

$this->title = Yii::t('app', 'Create Film Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
