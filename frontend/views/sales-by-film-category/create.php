<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByFilmCategory */

$this->title = Yii::t('app', 'Create Sales By Film Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales By Film Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-film-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
