<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByFilmCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sales-by-film-category-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'placeholder' => 'Category']) ?>

    <?= $form->field($model, 'total_sales')->textInput(['maxlength' => true, 'placeholder' => 'Total Sales']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
