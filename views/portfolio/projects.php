<?php
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $model->name;
?>
<div class="site-index">
<?php Pjax::begin(); ?>    

	<div class="">
	    <section>
	        <div class="page-title p-title"><p>PORTFOLIO</p></div>
	        <div class="wrap">
            	<?php foreach ($projects as $proj) {?>
                    <div class="col-md-3 col-sm-6  portfolio" data-toggle="modal" data-target="#bs-example-modal-lg">

						<button type="button" 
								id="modalButton<?=$proj->id?>" 
								class="imageButton" 
								value="index.php?r=portfolio/projview&id=<?=$proj->id?>" 
								onclick="callmodal(<?=$proj->id?>,'<?=$proj->name?>');" 
								>
									<?php foreach ($projimageall as $projimage) {
										if($projimage->project_id == $proj->id){
											?>
											<div class="image" style="background-image: url(<?=Yii::getAlias('@web').'/uploads/'.$projimage->image?>)">
											<?php
											break;
										}else{
											?>
											<div class="image <?=$proj->id?>" style="background-image: url(<?=Yii::getAlias('@web').'/uploads/noimage.jpg'?>)" id="<?=$projimage->project_id?>">
											<?php
											// break;
										}
									}?>

			                            <div class="overlayPortfolio">
			                                <div class="plus"><?=$proj->name?></div>

			                            </div>
			                        </div>

						</button>


						<?php 
					        Modal::begin([
					            'header'=>"<h4 class='modal-title' id='modalHeader'></h4>",
					            'id'=>'modal',
					            'size'=>'modal-lg',
					        	]);
				        		echo "<div id='modalContent'></div>";
					        Modal::end();
					    ?>

                    </div>
	            <?php  } ?>
                    <div class="portfolioContainer"></div>

	        </div>
	    </section>



	</div>


<?php Pjax::end(); ?>


</div>




