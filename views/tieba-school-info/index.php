<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\TiebaSchoolInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '贴吧列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tieba-school-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
            $searchWidget =  app\components\searchWidget\SearchWidget::begin();
            $searchWidget->setDropdownlistAttributes(app\models\searches\TiebaSchoolInfoSearch::searchAttributes());
            $searchWidget->setSearchModelName('TiebaSchoolInfoSearch');
            $searchWidget->setSearchColor('gray');
            $searchWidget->setSearchBoxLength(4);
            $searchWidget->setRequestUrl(\yii\helpers\Url::to(['tieba-school-info/index']));
            $searchWidget::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tieba_id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<a href='$model->href'>$model->name</a>";
                }
            ],
            'category',
            'followed_num',
            'post_num',
            'created_time',
            // 'status',
        ],
    ]); ?>
</div>
