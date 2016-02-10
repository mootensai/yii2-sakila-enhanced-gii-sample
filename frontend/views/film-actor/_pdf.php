<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\FilmActor */

$this->title = $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-actor-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Film Actor').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>