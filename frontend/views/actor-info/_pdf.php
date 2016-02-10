<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ActorInfo */

$this->title = $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actor Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-info-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Actor Info').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'actor_id',
        'first_name',
        'last_name',
        'film_info:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>