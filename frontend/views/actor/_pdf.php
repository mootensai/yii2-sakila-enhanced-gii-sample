<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Actor */

$this->title = $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Actor').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'actor_id',
        'first_name',
        'last_name',
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
    $gridColumnFilmActor = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'actor.actor_id',
            'label' => Yii::t('app', 'Actor'),
        ],
        [
            'attribute' => 'film.title',
            'label' => Yii::t('app', 'Film'),
        ],
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerFilmActor,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Film Actor').' '. $this->title),
        ],
        'columns' => $gridColumnFilmActor
    ]);
?>
    </div>
</div>