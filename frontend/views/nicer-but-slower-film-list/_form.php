<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\NicerButSlowerFilmList */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="nicer-but-slower-film-list-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'FID')->textInput(['placeholder' => 'FID']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'placeholder' => 'Category']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) ?>

    <?= $form->field($model, 'length')->textInput(['placeholder' => 'Length']) ?>

    <?= $form->field($model, 'rating')->dropDownList([ 'G' => 'G', 'PG' => 'PG', 'PG-13' => 'PG-13', 'R' => 'R', 'NC-17' => 'NC-17', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'actors')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
