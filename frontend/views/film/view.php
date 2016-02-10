<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Film */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Films'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Film').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['film_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->film_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->film_id], [
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
        'film_id',
        'title',
        'description:ntext',
        'release_year',
        [
            'attribute' => 'language.name',
            'label' => Yii::t('app', 'Language'),
        ],
        [
            'attribute' => 'originalLanguage.name',
            'label' => Yii::t('app', 'Language'),
        ],
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features',
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
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Film Actor').' '. $this->title),
        ],
        'columns' => $gridColumnFilmActor
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnFilmCategory = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'film.title',
            'label' => Yii::t('app', 'Film'),
        ],
        [
            'attribute' => 'category.name',
            'label' => Yii::t('app', 'Category'),
        ],
        'last_update',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerFilmCategory,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Film Category').' '. $this->title),
        ],
        'columns' => $gridColumnFilmCategory
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
</div>