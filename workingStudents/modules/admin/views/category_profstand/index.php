<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Category_profstandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Category Profstands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-profstand-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category Profstand', ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',
            'profstand_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
