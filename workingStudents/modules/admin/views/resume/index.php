<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resumes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Resume', ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'name',
            'surname',
            'patronymic',
            //'city_id',
            //'dateBirth',
            //'image',
            //'skills:ntext',
            //'personalQualities_id:ntext',
            //'CareerObjective_id',
            //'dateAdd',
            //'dateChanges',
            //'ShowOrHide',
            //'response',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
