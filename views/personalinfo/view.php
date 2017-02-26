<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personalinfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Personalinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personalinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'Name',
                'value' => $model->name,
            ],
            'birthday',
            [
                'attribute'=>'Picture',
                'value'=>Yii::getAlias('@web').'/uploads/'.$model->picture,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            // 'picture',
            [
                'attribute' => 'resume',
                 // 'value' => Yii::getAlias('@web').'/uploads/'.$model->resume,
                'value' => Html::a('Download',Yii::getAlias('@web').'/uploads/'.$model->resume),
                 'format' => ['raw',['class' => 'abc']]
            ],
            // 'resume',
        ],
    ]) ?>

</div>
