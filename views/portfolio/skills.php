<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name . ' - Skills';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-index">


<?php Pjax::begin(); ?>   


    <div class="col-md-12"">
        <section>
            <div class="page-title"><p>MY EXPERTISE</p></div>
            <div class="skills-container">
                <div class="row">
                <?php 
                    foreach ($skills as $skill) {?>
                        <div class="col-md-3 skillBox">
                            <div class="bar-container">
                                    <div class="circle roundBar-custom" data-value=<?=$skill->percent / 100?>></div>
                                    <div class="percent" ><?=$skill->percent?>%</div>
                            </div>
                            <div class="text-container">
                                <div class="skillname"><?=$skill->name?></div>
                                <div class="skilldescription"><?=$skill->description?></div>
                            </div>
                        </div>
                <?php }?>
 

                </div>

                <!-- If text is set, position: relative will be applied for the container -->
            </div>

        </section>

    </div>


<?php Pjax::end(); ?></div>
