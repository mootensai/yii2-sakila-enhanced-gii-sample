<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Language */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Language').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'language_id',
        'name',
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
    $gridColumnFilm = [
        ['class' => 'yii\grid\SerialColumn'],
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
    echo Gridview::widget([
        'dataProvider' => $providerFilm,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Film').' '. $this->title),
        ],
        'columns' => $gridColumnFilm
    ]);
?>
    </div>
</div>