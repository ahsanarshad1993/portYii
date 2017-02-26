<?php

namespace app\controllers;

use Yii;
use app\models\Personalinfo;
use app\models\PersonalinfoSearch;
use app\models\Coverletters;
use app\models\CoverlettersSearch;
use app\models\Objective;
use app\models\ObjectiveSearch;
use app\models\Skill;
use app\models\SkillSearch;
use app\models\Contact;
use app\models\ContactSearch;
use app\models\ContactForm;
use app\models\Education;
use app\models\EducationSearch;
use app\models\Workexperiance;
use app\models\WorkexperianceSearch;
use app\models\Technologyexperiance;
use app\models\TechnologyexperianceSearch;
use app\models\Project;
use app\models\Projectimage;
use app\models\ProjectSearch;
use app\models\Reference;
use app\models\ReferenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PersonalinfoController implements the CRUD actions for Personalinfo model.
 */
class PortfolioController extends Controller
{

    public function actionIndex()
    {
        $id = Personalinfo::find()->scalar();
        $model = Personalinfo::findOne($id);
        $objective = Objective::find()->where(['check' => 'true'])->orderBy(['id' => SORT_DESC])->one();
        $coverletter = Coverletters::find()->where(['check' => 'true'])->orderBy(['id' => SORT_DESC])->one();
        
        if ($objective == null) {
            throw new NotFoundHttpException('Please add Objectives');
        }
        
        return $this->render('index', [
            'model' => $model,
            'objective' => $objective,
            'coverletter' => $coverletter,
        ]);
    }

	public function actionAbout()
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

        return $this->render('about', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'model' => $model,
            'coverletter' => $coverletter,
            'contact' => $contact,
        ]);
    }

    public function actionSkills()
    {
        $id = Personalinfo::find()->scalar();
        $model = $this->findModel($id);

        $skills = Skill::find()->orderBy(['percent' => SORT_DESC])->all();


        return $this->render('skills', [
            'id' => $id,
            'model' => $model,
            'skills' => $skills,
        ]);
    }

    public function actionExperiance()
    {
        $id = Personalinfo::find()->scalar();
        $model = $this->findModel($id);

        $experiance = Workexperiance::find()->orderBy(['start' => SORT_DESC])->all();
        $technologyexperiance = Technologyexperiance::find()->all();

        return $this->render('experiance', [
            'id' => $id,
            'model' => $model,
            'experiance' => $experiance,
            'technologyexperiance' => $technologyexperiance,
        ]);
    }


    public function actionEducation()
    {
        $id = Personalinfo::find()->scalar();
        $model = $this->findModel($id);

        $education = Education::find()->all();


        return $this->render('education', [
            'id' => $id,
            'model' => $model,
            'education' => $education,
        ]);
    }

    public function actionProjects()
    {
        $id = Personalinfo::find()->scalar();
        $model = $this->findModel($id);
        $projimageall = Projectimage::find()->orderBy(['id' => SORT_DESC])->all();

        $projects = Project::find()->all();


        return $this->render('projects', [
            'id' => $id,
            'model' => $model,
            'projects' => $projects,
            'projimageall' => $projimageall,
        ]);
    }
    public function actionProjview($id)
    {
        $projimage = Projectimage::find()->where(['project_id' => $id])->orderBy(['id' => SORT_DESC])->one();

        if (($model = Project::findOne($id)) !== null) {
            return $this->renderAjax('projview', [
                'model' => $model,
                'projimage' => $projimage,
                'is_url' => $this->is_valid_url($model->link),
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    public function actionReference()
    {
        $id = Personalinfo::find()->scalar();
        $model = $this->findModel($id);

        $reference = Reference::find()->all();


        return $this->render('reference', [
            'id' => $id,
            'model' => $model,
            'reference' => $reference,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        $contact = Contact::find()->all();
        $id = Personalinfo::find()->scalar();
        $info = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
            'contact' => $contact,
            'info' => $info,
        ]);

    }

    protected function findModel($id)
    {
        if (($model = Personalinfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function is_valid_url($url) {
    // First check: is the url just a domain name? (allow a slash at the end)
    $_domain_regex = "|^[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,})/?$|";
    if (preg_match($_domain_regex, $url)) {
        return true;
    }

    // Second: Check if it's a url with a scheme and all
    $_regex = '#^([a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))$#';
    if (preg_match($_regex, $url, $matches)) {
        // pull out the domain name, and make sure that the domain is valid.
        $_parts = parse_url($url);
        if (!in_array($_parts['scheme'], array( 'http', 'https' )))
            return false;

        // Check the domain using the regex, stops domains like "-example.com" passing through
        if (!preg_match($_domain_regex, $_parts['host']))
            return false;

        // This domain looks pretty valid. Only way to check it now is to download it!
        return true;
    }

    return false;
}
}