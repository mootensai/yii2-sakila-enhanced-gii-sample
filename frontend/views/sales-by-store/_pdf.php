<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByStore */

$this->title = $model->store;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales By Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-store-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Sales By Store').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'store',
        'manager',
        'total_sales',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>