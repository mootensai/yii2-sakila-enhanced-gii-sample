<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesByStore */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sales-by-store-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'store')->textInput(['maxlength' => true, 'placeholder' => 'Store']) ?>

    <?= $form->field($model, 'manager')->textInput(['maxlength' => true, 'placeholder' => 'Manager']) ?>

    <?= $form->field($model, 'total_sales')->textInput(['maxlength' => true, 'placeholder' => 'Total Sales']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
