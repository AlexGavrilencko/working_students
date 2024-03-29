<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScannedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scanneds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scanned-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Scanned', ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'vacancy_id',
            'resume_id',
            'ViewOrSelect',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
