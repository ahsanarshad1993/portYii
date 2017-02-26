<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
?>

<div class="project-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <?php if($projimage == null){ ?>
                    <img src="<?=Yii::getAlias('@web').'/uploads/noimage.jpg'?>" class="modalImage">
                <?php }else{ ?>
                    <img src="<?=Yii::getAlias('@web').'/uploads/'.$projimage->image?>" class="modalImage">
                <?php } ?>

            </div>
            <div class="col-md-6 col-sm-6 modalData">
                    <span>Name:</span><p><?=$model->name?></p>
                    <?php if($is_url){ ?>
                        <span>URL:</span><p><a href="<?=$model->link?>" target="_blank"><?=$model->link?></a></p>
                    <?php } else { ?>
                        <span>URL:</span><p><?=$model->link?></p>
                    <?php } ?>
                    <span>Description:</span><p><?=$model->description?></p>
            </div>
        </div>
    </div>
    <div class="modal-footer row">
        <div class="col-md-offset-10 customButton" data-dismiss="modal">
            <span class="modalClose">Close</span>
        </div>
    </div>

</div>

