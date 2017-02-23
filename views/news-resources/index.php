<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\NewsResourcesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '新闻资源');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-resources-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $searchWidget =  app\components\searchWidget\SearchWidget::begin();
    $searchWidget->setDropdownlistAttributes(app\models\searches\NewsResourcesSearch::searchAttributes());
    $searchWidget->setSearchModelName('NewsResourcesSearch');
    $searchWidget->setSearchColor('gray');
    $searchWidget->setSearchBoxLength(4);
    $searchWidget->setRequestUrl(\yii\helpers\Url::to(['news-resource/index']));
    $searchWidget::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'media_name',
            'account_name',
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<a href='$model->href'>$model->title</a>";
                }
            ],
            'read_num',
            'category',
            'keyword',
            'release_time',
            'status',
            'created_time',
        ],
    ]); ?>
</div>
