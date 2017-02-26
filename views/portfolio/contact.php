<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */

$this->title = $model->name;
?>
<div class="site-index">
<?php Pjax::begin(); ?>    

<div class="col-md-12"">
    <section>
        <div class="page-title"><p>CONTACT AND LOCATION</p></div>
        <div>
            <div class="col-md-6 col-sd-6 contact-container">
                <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                    <div class="alert alert-success">
                        Thank you for contacting. I will respond to you as soon as possible.
                    </div>

                <?php else: ?>
                <div class="row">
                    <div class="col-lg-11">

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'subject') ?>

                            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="bottom-margin" style="font-family: ralewayregular">
                    <?php foreach ($contact as $mod) { ?>
                        <strong class="fix-width-100"><i class="fa fa-skype margin-right-5"></i><?=$mod->type?></strong> : <?=$mod->description?> 
                                <?php if($mod->extension){ ?>
                                    <span>ext. <?=$mod->extension?></span>
                                    <?php } ?>
                                <br>
                    <?php } ?>
                </div>
                <div id='map'></div>

            </div>
        </div>
    </section>


</div>
    <script>
      function initMap() {
        var uluru = {lat: 24.8023804, lng: 67.0271839};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails({
          placeId: 'ChIJL42onAk9sz4R0wXhO-AvZdE'
        }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                place.formatted_address + '</div>');
              infowindow.open(map, this);
            });
          }
        });


      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmJEsdCJB2cH6YRy5WOlZa6uMj9JEbylE&libraries=places&callback=initMap">
    </script>
<?php Pjax::end(); ?></div>




