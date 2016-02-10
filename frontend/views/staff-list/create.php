<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StaffList */

$this->title = Yii::t('app', 'Create Staff List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
