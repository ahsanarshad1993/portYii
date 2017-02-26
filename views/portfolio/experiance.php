<?php
use yii\widgets\Pjax;
use yii\jui\Accordion;

/* @var $this yii\web\View */

$this->title = $model->name . ' - Experiance';

?>
<div class="site-index">
<?php Pjax::begin(); ?>    

<div class="col-md-12">
        <section>
            <div class="page-title"><p>WORK EXPERIENCE</p></div>
            <div class="experiance-container panel-group " id="bs-collapse">
            	<div class="customAccordion">
	            	<?php
						for ($i=0; $i < count($experiance) ; $i++) { 
							$startM = date("F",strtotime($experiance[$i]['start']));
							$startY = date("y",strtotime($experiance[$i]['start']));
							if($experiance[$i]['end']){
								$endM = date("F",strtotime($experiance[$i]['end']));
								$endY = date("y",strtotime($experiance[$i]['end']));
								$end = $endM.' '.$endY;
							}else{
								$end = 'Present';
							}

							$items[$i]['header'] = 
								'<i class="graduation-cap-custom glyphicon glyphicon-briefcase"></i><div class="customAccordionHeader"><span class="year">'. $startM .' '. $startY . ' - '.$end.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>'.$experiance[$i]['position'] . '</div>';

							$items[$i]['content'] = '<div class="customAccordionContent"><span>'.$experiance[$i]['company'].'</span><ul>';
							for ($j=0; $j < count($technologyexperiance) ; $j++) { 
							 	if($technologyexperiance[$j]['workexperiance_id'] === $experiance[$i]['id']){
									$items[$i]['content'].='<li>'.$technologyexperiance[$j]['name'].'</li>';
								}								
	                        }	
							$items[$i]['content'].= '</ul>' .$experiance[$i]['details'] . '</div>';
						}

		            		echo Accordion::widget([
							    'items' => $items,
							    'options' => ['tag' => 'div'],
							    'itemOptions' => ['tag' => 'div'],
							    'headerOptions' => ['tag' => 'h3'],
							    'clientOptions' => ['collapsible' => true, 'animate' => ['easing' =>'easeOutBack', 'duration' => 900],'heightStyle' => 'content'],
							]);
		            	
	            	?>
	            </div>
            </div>
        </section>

</div>

<?php Pjax::end(); ?></div>
