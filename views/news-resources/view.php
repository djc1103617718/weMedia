<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NewsResources */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Resources'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-resources-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'media_name',
            'account_name',
            'href',
            'title',
            'read_num',
            'category',
            'keyword',
            'release_time',
            'status',
            'created_time',
        ],
    ]) ?>

</div>
