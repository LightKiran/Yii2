<?php

//use Yii;

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p class="text-muted">
        <!-- asDatetime=output  Feb 27, 2020 11:58:47 AM  //  asRelativeTime = 18 hours ago / 5 mins ago-->
        <small>Created At: <B><?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></B></small>

        <!--created by is model function-->
        <small class="pull-right">Created By: <B><?php echo $model->createdBy->username ?></B></small>

    </p>
    <?php if (!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Update', ['update', 'slug' => $model->slug], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'slug' => $model->slug], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

    <?php endif; ?>

    <?php
    // DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'title',
//            'slug',
//            'body:ntext',
//            'created_at',
//            'updated_at',
//            'created_by',
//        ],
//    ]) 
    ?>

    <div>
        <?php echo $model->getEncodedBody(); ?>
    </div>

</div>
