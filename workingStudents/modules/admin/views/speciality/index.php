<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecialitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Specialities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speciality-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Speciality', ['create'], ['class' => 'btn btn-secondary']) ?>
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
            'bigspecial_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>