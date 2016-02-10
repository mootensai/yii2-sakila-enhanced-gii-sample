<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Store */

$this->title = $model->store_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Store').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['store_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->store_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->store_id], [
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
        [
            'attribute' => 'staff.staff_id',
            'label' => Yii::t('app', 'Staff'),
        ],
        [
            'attribute' => 'managerStaff.staff_id',
            'label' => Yii::t('app', 'Staff'),
        ],
        [
            'attribute' => 'address.address',
            'label' => Yii::t('app', 'Address'),
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
    $gridColumnCustomer = [
        ['class' => 'yii\grid\SerialColumn'],
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
    echo Gridview::widget([
        'dataProvider' => $providerCustomer,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Customer').' '. $this->title),
        ],
        'columns' => $gridColumnCustomer
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnInventory = [
        ['class' => 'yii\grid\SerialColumn'],
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
    echo Gridview::widget([
        'dataProvider' => $providerInventory,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Inventory').' '. $this->title),
        ],
        'columns' => $gridColumnInventory
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnStaff = [
        ['class' => 'yii\grid\SerialColumn'],
        'staff_id',
        'first_name',
        'last_name',
        [
            'attribute' => 'address.address',
            'label' => Yii::t('app', 'Address'),
        ],
        'picture',
        'email:email',
        'store_id',
        'active',
        'username',
        'password',
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerStaff,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Staff').' '. $this->title),
        ],
        'columns' => $gridColumnStaff
    ]);
?>
    </div>
</div>