<?php

namespace backend\controllers;

use common\models\UploadsImage;
use common\models\WorkerChildren;
use common\models\WorkerFiles;
use common\models\WorkerPhones;
use common\models\Workers;
use common\models\search\WorkersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorkersController implements the CRUD actions for Workers model.
 */
class WorkersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'delete-phone' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Workers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WorkersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Workers model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'worker_phones' => WorkerPhones::findAll(['worker_id' => $id]),
            'worker_files' => WorkerFiles::findAll(['worker_id' => $id]),
            'worker_children' => WorkerChildren::findAll(['worker_id' => $id]),
        ]);
    }

    /**
     * Creates a new Workers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Workers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created = time();
                $model->updated = time();
                $model->status = 0;
                $model->worker_status_id = 1;
                $files = UploadedFile::getInstance($model, 'imageFile');
                $uploads = UploadsImage::uploadImage($model, $files, 'workers');
                if ($uploads) {
                    $model->image = $uploads;
                    $model->save(false);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Workers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAddPhone()
    {
        $model = new WorkerPhones();
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->created = time();
            $model->status = 0;
            $model->save();
            return $this->redirect($this->rer());
        }
    }

    public function actionAddFile()
    {
        $model = new WorkerFiles();
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->created = time();
            $model->status = 0;
            $files = UploadedFile::getInstance($model, 'imageFile');
            $uploads = UploadsImage::uploadImage($model, $files, "worker_files");
            if ($uploads) {
                $model->image = $uploads;
                $model->save(false);
                \Yii::$app->session->setFlash('success', 'Документ успешно сохранен');
                return $this->redirect($this->rer());
            }
        }
    }

    public function actionPhoneStatus($id, $status)
    {
        $model = WorkerPhones::findOne($id);
        $model->status = $status;
        $model->update();
        return $this->redirect($this->rer());
    }

    /**
     * Deletes an existing Workers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeletePhone($id)
    {
        $model = WorkerPhones::findOne($id);
        $model->delete();
        \Yii::$app->session->setFlash('success', 'Номер телефона успешно удалён');
        return $this->redirect($this->rer());
    }

    /**
     * Finds the Workers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Workers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Workers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function rer()
    {
        return \Yii::$app->request->referrer;
    }
}
