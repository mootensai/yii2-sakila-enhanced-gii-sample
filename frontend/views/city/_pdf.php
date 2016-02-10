<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\City */

$this->title = $model->city;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'City').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'city_id',
        'city',
        [
            'attribute' => 'country.country',
            'label' => Yii::t('app', 'Country'),
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
    $gridColumnAddress = [
        ['class' => 'yii\grid\SerialColumn'],
        'address_id',
        'address',
        'address2',
        'district',
        [
            'attribute' => 'city.city',
            'label' => Yii::t('app', 'City'),
        ],
        'postal_code',
        'phone',
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerAddress,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Address').' '. $this->title),
        ],
        'columns' => $gridColumnAddress
    ]);
?>
    </div>
</div>