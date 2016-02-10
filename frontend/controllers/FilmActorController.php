<?php

namespace frontend\controllers;

use Yii;
use frontend\models\FilmActor;
use frontend\models\FilmActorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmActorController implements the CRUD actions for FilmActor model.
 */
class FilmActorController extends Controller
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
     * Lists all FilmActor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilmActorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilmActor model.
     * @param integer $actor_id
     * @param integer $film_id
     * @return mixed
     */
    public function actionView($actor_id, $film_id)
    {
        $model = $this->findModel($actor_id, $film_id);
        return $this->render('view', [
            'model' => $this->findModel($actor_id, $film_id),
        ]);
    }

    /**
     * Creates a new FilmActor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilmActor();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FilmActor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $actor_id
     * @param integer $film_id
     * @return mixed
     */
    public function actionUpdate($actor_id, $film_id)
    {
        $model = $this->findModel($actor_id, $film_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FilmActor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $actor_id
     * @param integer $film_id
     * @return mixed
     */
    public function actionDelete($actor_id, $film_id)
    {
        $this->findModel($actor_id, $film_id)->deleteWithRelated();

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
     * Finds the FilmActor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $actor_id
     * @param integer $film_id
     * @return FilmActor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($actor_id, $film_id)
    {
        if (($model = FilmActor::findOne(['actor_id' => $actor_id, 'film_id' => $film_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
