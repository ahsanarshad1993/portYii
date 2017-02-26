<?php
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = $model->name;
?>
<div class="site-index">
<?php Pjax::begin(); ?>    

    <div class=" home">
        <section class="bgimage overlay">
            <div class="text">
                <!-- <p class="home-heading">Hello</p> -->
                <!-- <p class="home-heading">I'm <span><?=$model->name?></span></p> -->
                <!-- <p class="home-heading">}</p> -->
                <p class="intro">Hello, I'm <br></p>
                <div class="typewriter home-heading">
  					<h1>
  					<a href="" class="typewrite" data-period="2000" data-type='[ "<?=$model->name?>.", "<?=$coverletter->name?>." ]'>
					    <span class="wrap"></span>
					  </a></h1>
				</div>


                <p class="intro"><span><br><?=$objective->objective?></span></p>

            </div>
        </section>
    </div>

<?php Pjax::end(); ?></div>




