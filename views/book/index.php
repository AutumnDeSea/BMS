<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('添加图书', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'caption'=>"图库库列表",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'bookId',
            'bookName',
            [
                'attribute' => 'isBorrow',
                'value' => function($model) {
                    return $model->isBorrow == 1 ? '已借出': '在库';
                },
                'contentOptions' => ['style'=>'color:red'],
            ],
            [
                'attribute' => 'borrowTime',
                'value' => function($model) {
                    return $model->borrowTime;
                }
            ],
            'borrowDuration',
            'price',
            'author',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
