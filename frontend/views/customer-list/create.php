<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerList */

$this->title = Yii::t('app', 'Create Customer List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
