<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Rental */

$this->title = Yii::t('app', 'Create Rental');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rentals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
