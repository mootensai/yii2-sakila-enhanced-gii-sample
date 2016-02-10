<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByFilmCategory */

$this->title = $model->category;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales By Film Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-film-category-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Sales By Film Category').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'category',
        'total_sales',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>