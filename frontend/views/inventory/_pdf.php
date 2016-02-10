<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Inventory */

$this->title = $model->inventory_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Inventory').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'inventory_id',
        [
            'attribute' => 'film.title',
            'label' => Yii::t('app', 'Film'),
        ],
        [
            'attribute' => 'store.store_id',
            'label' => Yii::t('app', 'Store'),
        ],
        'last_update',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnRental = [
        ['class' => 'yii\grid\SerialColumn'],
        'rental_id',
        'rental_date',
        [
            'attribute' => 'inventory.inventory_id',
            'label' => Yii::t('app', 'Inventory'),
        ],
        [
            'attribute' => 'customer.customer_id',
            'label' => Yii::t('app', 'Customer'),
        ],
        'return_date',
        [
            'attribute' => 'staff.staff_id',
            'label' => Yii::t('app', 'Staff'),
        ],
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerRental,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Rental').' '. $this->title),
        ],
        'columns' => $gridColumnRental
    ]);
?>
    </div>
</div>