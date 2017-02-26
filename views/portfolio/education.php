<?php
use yii\widgets\Pjax;
use yii\jui\Accordion;
/* @var $this yii\web\View */

$this->title = $model->name . ' - Education';
?>
<div class="site-index">
<?php Pjax::begin(); ?>    

<div class="col-md-12">
        <section>
            <div class="page-title"><p>EDUCATION</p></div>
            <div class="experiance-container" id="scroll-style">
            	<div class="customAccordion">
	            	<?php
	            		$i = 0;
						foreach ($education as $edu) {
							$startM = date("F",strtotime($edu->start));
							$startY = date("y",strtotime($edu->start));
							$endM = date("F",strtotime($edu->end));
							$endY = date("y",strtotime($edu->end));

							$items[$i]['header'] = 
								'<i class="graduation-cap-custom glyphicon glyphicon-education"></i><div class="customAccordionHeader"><span class="year">'. $startM .' '. $startY . ' - '. $endM .' '. $endY.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>'.$edu->degree . '</div>';

							$items[$i]['content'] = 
								'<div class="customAccordionContent"><ul><li><b>'. $edu->institute. '</b></li></ul>' .$edu->description . '</div>';
							$i++;
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
