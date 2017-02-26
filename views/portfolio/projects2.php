<?php
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */

$this->title = $model->name;
?>
<div class="site-index">
<?php Pjax::begin(); ?>    

	<div class="">
	    <section>
	        <div class="page-title p-title"><p>PORTFOLIO</p></div>
	        <div class="portfolioContainer">
            	<?php foreach ($projects as $proj) {?>
                    <div class="col-md-3 col-sm-6  portfolio" data-toggle="modal" data-target="#bs-example-modal-lg">
                        <div class="image" style="background-image: url('../web/uploads/guitar.jpg')">
                            <div class="overlayPortfolio">
                                <div class="plus">Click for <br> <?=$proj->name?></div>
                            </div>
                        </div>
                    </div>
	            <?php  } ?>
	        </div>
	    </section>

	    <!-- Modal code -->
	    <div class="modal fade " id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                    <h4 class="modal-title" id="myModalLabel"><?=$proj->name?></h4>
	                </div>
	                <div class="modal-body">
	                    <div class="container-fluid">
	                        <div class="row">
	                            <div class="col-md-6 col-sm-6">
	                                <img src="{{projects[indexval].image}}" class="modalImage">
	                            </div>
	                            <div class="col-md-6 col-sm-6 modalData">
	                                    <span>Name:</span><p><?=$proj->name?></p>
	                                    <span>URL:</span><p><?=$proj->link?></p>
	                                    <span>Description:</span><p><?=$proj->description?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="modal-footer row">
	                        <div class="col-md-offset-10 customButton" data-dismiss="modal">
	                            <span class="modalClose">Close</span>
	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>
	    </div>

	</div>


<?php Pjax::end(); ?>


</div>




                        <div class="image" style="background: url('../web/uploads/guitar.jpg')">
                            <div class="overlayPortfolio">
                                <div class="plus">Click for <br> <?=$proj->name?></div>
                                <?= Html::button(
										$proj->name, 
										[
											'value'=>Url::to('index.php?r=portfolio/projview&id='.$proj->id), 
											'class' => 'imageButton', 
											'id'=>'modalButton'.$proj->id, 
											'onclick' => "callmodal(".$proj->id.",'".$proj->name."');",
											'style' => "background-image: url('../web/uploads/guitar.jpg')"
										]
									)
								?> 
                            </div>
                        </div>

