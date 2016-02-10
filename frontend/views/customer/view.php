<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customer */

$this->title = $model->customer_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Customer').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['customer_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->customer_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'customer_id',
        [
            'attribute' => 'store.store_id',
            'label' => Yii::t('app', 'Store'),
        ],
        'first_name',
        'last_name',
        'email:email',
        [
            'attribute' => 'address.address',
            'label' => Yii::t('app', 'Address'),
        ],
        'active',
        'create_date',
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Payment').' '. $this->title),
        ],
        'columns' => $gridColumnPayment
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Rental').' '. $this->title),
        ],
        'columns' => $gridColumnRental
    ]);
?>
    </div>
</div>