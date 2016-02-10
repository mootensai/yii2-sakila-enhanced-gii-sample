<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Rental */

$this->title = $model->rental_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rentals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Rental').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPayment = [
        ['class' => 'yii\grid\SerialColumn'],
        'payment_id',
        [
            'attribute' => 'customer.customer_id',
            'label' => Yii::t('app', 'Customer'),
        ],
        [
            'attribute' => 'staff.staff_id',
            'label' => Yii::t('app', 'Staff'),
        ],
        [
            'attribute' => 'rental.rental_id',
            'label' => Yii::t('app', 'Rental'),
        ],
        'amount',
        'payment_date',
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPayment,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Payment').' '. $this->title),
        ],
        'columns' => $gridColumnPayment
    ]);
?>
    </div>
</div>