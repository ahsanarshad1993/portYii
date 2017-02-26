<?php

namespace app\controllers;

use Yii;
use app\models\Project;
use app\models\Projectimage;
use app\models\ProjectimageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProjectimageController implements the CRUD actions for Projectimage model.
 */
class ProjectimageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                    'only' => ['index','create','update','view','delete'],
                    'rules' => [
                       // allow authenticated users
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        // everything else is denied
                    ],
            ],
        ];
    }

    /**
     * Lists all Projectimage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectimageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projectimage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projectimage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->user->loginRequired();
        } else {
            $model = new Projectimage();
            $project = Project::find()->all();

            if ($model->load(Yii::$app->request->post())) {
                $picture = UploadedFile::getInstance($model, 'picture');

                $model->image = $picture;
                $model->picture = $picture;

                $path = Yii::$app->basePath . Yii::$app->params['uploadPath'] . $picture;

                if($model->save()){
                    $picture->saveAs($path);
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                     print_r($model->getErrors());
                }
            }
            else {
                return $this->render('create', [
                    'model' => $model,
                    'project' => $project,
                ]);
            }

            // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //     return $this->redirect(['view', 'id' => $model->id]);
            // } else {
            //     return $this->render('create', [
            //         'model' => $model,
            //         'project' => $project,
            //     ]);
            // }
        }
    }

    /**
     * Updates an existing Projectimage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projectimage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projectimage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projectimage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projectimage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
