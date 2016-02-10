<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payment */

$this->title = $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Payment').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>