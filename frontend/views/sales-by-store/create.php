<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByStore */

$this->title = Yii::t('app', 'Create Sales By Store');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales By Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
