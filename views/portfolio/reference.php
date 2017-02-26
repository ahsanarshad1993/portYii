<?php
use yii\widgets\Pjax;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */


$this->title = $model->name;
?>
<div class="site-index">
<?php Pjax::begin(); ?>    

	<div class="col-md-12" ng-controller="ReferencesCtrl">
	    <section>
	        <div class="page-title"><p>REFERENCES</p></div>
	    </section>

	    <div class="referencesContainer demo">
		    <div class="my-slider">
				<ul>
					<?php foreach ($reference as $ref) { ?>
						<li>
			                <p class="lead"><?=$ref->review?></p>
			                <p class="reviewer-details">
			                	</br>
				                <span class="reviewer"><?=$ref->name?></span></br>
				                <span class="reviewer-desig"><?=$ref->designation?>, <?=$ref->company?></span></br>
				                <span class="reviewer-contact"><?=$ref->contact?></span></br>
				                <span class="reviewer-email"><?=$ref->email?></span></br>
				                <span class="reviewer-url"><?=$ref->url?></span>
				            </p>
			            </li>
			        <?php } ?>
				</ul>
			</div>
	    </div>




<!-- 	    <div class="referencesContainer">
	    	<?php //foreach ($reference as $ref) {?>
		        <flex-slider flex-slide="r in references track by $index"
		            class="flex-viewport" smooth-height="true" pause-on-hover="true" animation="slide" slideshowSpeed="3000" control-nav="true" direction-nav="false">
		            <li>
	
		            </li>
		        </flex-slider>
		     <?php //	} ?>
	    </div> -->


	</div>



<?php Pjax::end(); ?></div>




