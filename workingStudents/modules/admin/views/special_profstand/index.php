<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Special_profstandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Special Profstands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-profstand-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Special Profstand', ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categProfstand_id',
            'bigspeciality_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
