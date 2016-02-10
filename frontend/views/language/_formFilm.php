<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Film',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'film_id' => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true]],
        'title' => ['type' => TabularForm::INPUT_TEXT],
        'description' => ['type' => TabularForm::INPUT_TEXTAREA],
        'release_year' => ['type' => TabularForm::INPUT_TEXT],
        'original_language_id' => [
            'label' => 'Language',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Language::find()->orderBy('name')->asArray()->all(), 'language_id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Language')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'rental_duration' => ['type' => TabularForm::INPUT_TEXT],
        'rental_rate' => ['type' => TabularForm::INPUT_TEXT],
        'length' => ['type' => TabularForm::INPUT_TEXT],
        'replacement_cost' => ['type' => TabularForm::INPUT_TEXT],
        'rating' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'G' => 'G', 'PG' => 'PG', 'PG-13' => 'PG-13', 'R' => 'R', 'NC-17' => 'NC-17', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Rating')],
                    ]
        ],
        'special_features' => ['type' => TabularForm::INPUT_TEXT],
        'last_update' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowFilm(' . $key . '); return false;', 'id' => 'film-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Film'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowFilm()']),
        ]
    ]
]);
Pjax::end();
?>