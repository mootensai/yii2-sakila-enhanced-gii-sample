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
    'formName' => 'Payment',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'payment_id' => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true]],
        'customer_id' => [
            'label' => 'Customer',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Customer::find()->orderBy('customer_id')->asArray()->all(), 'customer_id', 'customer_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Customer')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'rental_id' => [
            'label' => 'Rental',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Rental::find()->orderBy('rental_id')->asArray()->all(), 'rental_id', 'rental_id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Rental')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'amount' => ['type' => TabularForm::INPUT_TEXT],
        'payment_date' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Payment Date')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'hh:ii:ss dd-M-yyyy'
            ]
        ]
],
        'last_update' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowPayment(' . $key . '); return false;', 'id' => 'payment-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Payment'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPayment()']),
        ]
    ]
]);
Pjax::end();
?>