<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>


<?php $this->beginBody() ?>
    <div>
        <?php if(Yii::$app->user->isGuest){?>




            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="#">MENU</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav mobile-menu">
                            <li><a class='mobile-menu' href="?r=portfolio/index">Home</a></li>
                            <li><a href="?r=portfolio/about">About</a></li>
                            <li><a href="?r=portfolio/skills">Skills</a></li>
                            <li><a href="?r=portfolio/experiance">Experiance</a></li>
                            <li><a href="?r=portfolio/education">Education</a></li>
                            <li><a href="?r=portfolio/projects">Portfolio</a></li>
                            <li><a href="?r=portfolio/reference">References</a></li>
                            <li><a href="?r=portfolio/contact">Contact</a></li>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!--<li><a href="?r=site/login">Login</a></li>-->

            <div class="col-md-12 mainbody">
                <div style="font-weight: bold;">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                 </div>

                    <?= $content ?>
                    
            </div>
        <?php }else{ ?>
            <div class="col-md-3 sidebar">
                <div>
                  <ul class="nav nav-menu" id="primary-menu" aria-expanded="false">
                    <li class="active"><a href='?r=site/index'>Home</a></li>
                    <li><a href="?r=personalinfo/home">Personal Information</a></li>
                    <li><a href="?r=coverletters/index">My Cover Letters</a></li>
                    <li><a href="?r=objective/index">My Objectives</a></li>
                    <li><a href="?r=skill/index">My Skills</a></li>
                    <li><a href="?r=workexperiance/index">My Experiance</a></li>
                    <li><a href="?r=technologyexperiance/index">My Technology Experiance</a></li>
                    <li><a href="?r=education/index">My Education</a></li>
                    <li><a href="?r=project/index">My Projects</a></li>
                    <li><a href="?r=projectimage/index">My Project Images</a></li>
                    <li><a href="?r=reference/index">My References</a></li>
                    <li><a href="?r=contact/index">My Contacts</a></li>
                    <li></br></li>

                    <li>
                        <?= Html::beginForm(['/site/logout'], 'post') ?>
                        <?= Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout menubutton']) ?>
                        <?= Html::endForm() ?>
                    </li>

                  </ul>
                </div>
            </div>
            <div class="col-md-9 mainbody">
                <div style="font-weight: bold;">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                 </div>
                <?= $content ?>
            </div>
        <?php } ?>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
