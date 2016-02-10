<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ActorInfo */

$this->title = Yii::t('app', 'Create Actor Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actor Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
