<?php

namespace app\controllers;

use Yii;
use app\models\Personalinfo;
use app\models\PersonalinfoSearch;
use app\models\Coverletters;
use app\models\CoverlettersSearch;
use app\models\Contact;
use app\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PersonalinfoController implements the CRUD actions for Personalinfo model.
 */
class PersonalinfoController extends Controller
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
     * Lists all Personalinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalinfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Personalinfo::find()->scalar();
        $model = $this->findModel($id);

        $coverletter = Coverletters::find()->where(['check' => 'true'])->orderBy(['id' => SORT_DESC])->one();
        $contact = Contact::find()->all();
        // echo $coverletter;
        // print_r($contact);
        // die();
        // return $this->redirect(['view', 'id' => $id]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $model,
            'coverletter' => $coverletter,
            'contact' => $contact,
        ]);
    }

    public function actionHome(){
        $id = Personalinfo::find()->scalar();
        if(Personalinfo::find()->scalar() == null){
            return $this->redirect(['create']);
        }else{
            return $this->redirect(['view', 'id' => $id]);
        }

    }

    /**
     * Displays a single Personalinfo model.
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
     * Creates a new Personalinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->user->loginRequired();
        } else {
            if(Personalinfo::find()->scalar() == null){

                $model = new Personalinfo();

                // if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //     return $this->redirect(['view', 'id' => $model->id]);
                // } else {
                //     return $this->render('create', [
                //         'model' => $model,
                //     ]);
                // }

                if ($model->load(Yii::$app->request->post())) {
                    $picture = UploadedFile::getInstance($model, 'picture');
                    // $model->picture = $image->name;
                    // $ext = end((explode(".", $image->name)));

                    // $model->picture = Yii::$app->security->generateRandomString().".{$ext}";
                    // $path = Yii::$app->params['uploadPath'] . $model->picture;
                    $path = Yii::$app->basePath . Yii::$app->params['uploadPath'] . $model->picture;
                    // echo $path;
                    // echo $model->picture;
                    // die();
                    if($model->save()){
                        $picture->saveAs($path);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

            }else{
                return $this->redirect(['update', 'id' => Personalinfo::find()->scalar()]);
            }
        }    
    }

    /**
     * Updates an existing Personalinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
                $image = UploadedFile::getInstance($model, 'image');
                $file = UploadedFile::getInstance($model, 'file');

                $model->picture = $image;
                $model->resume = $file;

                $model->image = $image;
                $model->file = $file;

                $path = Yii::$app->basePath . Yii::$app->params['uploadPath'] . $image;
                $pathfile = Yii::$app->basePath . Yii::$app->params['uploadPath'] . $file;

                if($model->save()){
                    $image->saveAs($path);
                    $file->saveAs($pathfile);
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                     print_r($model->getErrors() );
                }
        } 

        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Personalinfo model.
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
     * Finds the Personalinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personalinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personalinfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
