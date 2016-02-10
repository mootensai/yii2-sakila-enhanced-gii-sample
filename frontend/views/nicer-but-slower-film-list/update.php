<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\NicerButSlowerFilmList */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nicer But Slower Film List',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nicer But Slower Film Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nicer-but-slower-film-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
