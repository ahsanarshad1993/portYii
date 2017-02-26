<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name . ' - About';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-index">


<?php Pjax::begin(); ?>    

    <div class="col-md-12 col-sm-12 about">
        <section class="row">
            <div class="col-md-5 photo-position">
                <img align="middle" src="<?=Yii::getAlias('@web').'/uploads/'.$model->picture?>" class="photograph">
            </div>
            <div class="col-md-7">
                <div class="about-text">
                    <div class="page-title"><p>ABOUT ME</p></div>
                    <div class="about-name"><?=$model->name?></div>

                    <div class="about-subheading"><?=$coverletter->name?></div>
                    <div class="bottom-margin">
                        <strong class="fix-width-100"><i class="fa fa-calendar margin-right-5"></i>Birthdate</strong> : 
                            <?=$model->birthday?><br>
                        <?php foreach ($contact as $mod) { ?>
                            <strong class="fix-width-100"><i class="fa fa-skype margin-right-5"></i><?=$mod->type?></strong> : <?=$mod->description?> 
                                    <?php if($mod->extension){ ?>
                                        <span>ext. <?=$mod->extension?></span>
                                        <?php } ?>
                                    <br>
                        <?php } ?>
                    </div>
                    <div class="about-scrollbar" id="scroll-style">
                            <p><?=$coverletter->body?></p>
                    </div>
                    <a href="http://<?=Yii::getAlias('@web').'/uploads/'.$model->resume?>" target="_blank">
                        <div class="about-button customButton">Download Resume</div>
                    </a>
                </div>


            </div>


        </section>


    </div>

<?php Pjax::end(); ?></div>
