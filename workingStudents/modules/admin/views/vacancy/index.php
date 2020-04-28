<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vacancy', ['create'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'user_id',
            'organization_id',
            'city_id',
            //'experience_id',
            //'employment_id',
            //'schedule_id',
            //'salary',
            //'position_id',
            //'duties:ntext',
            //'requirement:ntext',
            //'conditions:ntext',
            //'category_id',
            //'dateAdd',
            //'dateChanges',
            //'WorkOrPractice',
            //'ShowOrHide',
            //'response',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
