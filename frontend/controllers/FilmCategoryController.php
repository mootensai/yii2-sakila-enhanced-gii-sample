<?php

namespace frontend\controllers;

use Yii;
use frontend\models\FilmCategory;
use frontend\models\FilmCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmCategoryController implements the CRUD actions for FilmCategory model.
 */
class FilmCategoryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all FilmCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilmCategory model.
     * @param integer $film_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionView($film_id, $category_id)
    {
        $model = $this->findModel($film_id, $category_id);
        return $this->render('view', [
            'model' => $this->findModel($film_id, $category_id),
        ]);
    }

    /**
     * Creates a new FilmCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilmCategory();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FilmCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $film_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionUpdate($film_id, $category_id)
    {
        $model = $this->findModel($film_id, $category_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FilmCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $film_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionDelete($film_id, $category_id)
    {
        $this->findModel($film_id, $category_id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
    /**
     * Finds the FilmCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $film_id
     * @param integer $category_id
     * @return FilmCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($film_id, $category_id)
    {
        if (($model = FilmCategory::findOne(['film_id' => $film_id, 'category_id' => $category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
