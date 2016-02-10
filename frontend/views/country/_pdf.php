<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Country */

$this->title = $model->country;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Country').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'country_id',
        'country',
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
    $gridColumnCity = [
        ['class' => 'yii\grid\SerialColumn'],
        'city_id',
        'city',
        [
            'attribute' => 'country.country',
            'label' => Yii::t('app', 'Country'),
        ],
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCity,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'City').' '. $this->title),
        ],
        'columns' => $gridColumnCity
    ]);
?>
    </div>
</div>