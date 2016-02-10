<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\NicerButSlowerFilmList */

$this->title = Yii::t('app', 'Create Nicer But Slower Film List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nicer But Slower Film Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nicer-but-slower-film-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
