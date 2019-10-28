<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExperienceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experiences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experience-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Experience', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'resume_id',
            'dateStart',
            'dateEnd',
            'StudyOrWork',
            //'nameOrganiz_id',
            //'speciality_id',
            //'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
