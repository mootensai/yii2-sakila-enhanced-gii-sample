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
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model['actor_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id], [
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