<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\NicerButSlowerFilmList */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nicer But Slower Film Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nicer-but-slower-film-list-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Nicer But Slower Film List').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'FID',
        'title',
        'description:ntext',
        'category',
        'price',
        'length',
        'rating',
        'actors:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>