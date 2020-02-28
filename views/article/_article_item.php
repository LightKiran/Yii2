<?php
/* @var $model app\models\Article */
?>


<!-- /* @var $model app\models\Article */ use this for auto completion -->
<div>
    <a href="<?php  echo yii\helpers\Url::to(['/article/view', 'slug' => $model->slug]) ?>">
        <h3>
            <?php echo \yii\helpers\Html::encode($model->title) ?> 
        </h3>
    </a>
    <div>
        <!-- showing limited number of words that is 40-->
        <?php /* echo yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($model->body), 40) */?>
        
        <!--using function of model for body-->
        <?php echo yii\helpers\StringHelper::truncateWords($model->getEncodedBody(), 40) ?>

    </div>
    
</div>
