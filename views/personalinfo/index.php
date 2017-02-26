<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Information';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-index">


<?php Pjax::begin(); ?>    



    <?php 
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'summary'=>'', 
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'birthday',
            'picture',
            'resume',
            // 'contacts.type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>
<?php Pjax::end(); ?></div>
