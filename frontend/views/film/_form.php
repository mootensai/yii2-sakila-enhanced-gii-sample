<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Film */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'FilmActor', 
        'relID' => 'film-actor', 
        'value' => \yii\helpers\Json::encode($model->filmActors),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'FilmCategory', 
        'relID' => 'film-category', 
        'value' => \yii\helpers\Json::encode($model->filmCategories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Inventory', 
        'relID' => 'inventory', 
        'value' => \yii\helpers\Json::encode($model->inventories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'film_id')->textInput(['placeholder' => 'Film']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'release_year')->textInput(['maxlength' => true, 'placeholder' => 'Release Year']) ?>

    <?= $form->field($model, 'language_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Language::find()->orderBy('language_id')->asArray()->all(), 'language_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Language')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'original_language_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Language::find()->orderBy('language_id')->asArray()->all(), 'language_id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Language')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'rental_duration')->textInput(['placeholder' => 'Rental Duration']) ?>

    <?= $form->field($model, 'rental_rate')->textInput(['maxlength' => true, 'placeholder' => 'Rental Rate']) ?>

    <?= $form->field($model, 'length')->textInput(['placeholder' => 'Length']) ?>

    <?= $form->field($model, 'replacement_cost')->textInput(['maxlength' => true, 'placeholder' => 'Replacement Cost']) ?>

    <?= $form->field($model, 'rating')->dropDownList([ 'G' => 'G', 'PG' => 'PG', 'PG-13' => 'PG-13', 'R' => 'R', 'NC-17' => 'NC-17', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'special_features')->textInput(['maxlength' => true, 'placeholder' => 'Special Features']) ?>

    <?= $form->field($model, 'last_update')->textInput(['placeholder' => 'Last Update']) ?>

    <div class="form-group" id="add-film-actor"></div>

    <div class="form-group" id="add-film-category"></div>

    <div class="form-group" id="add-inventory"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
