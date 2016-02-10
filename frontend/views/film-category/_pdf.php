<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\FilmCategory */

$this->title = $model->film_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-category-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Film Category').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>