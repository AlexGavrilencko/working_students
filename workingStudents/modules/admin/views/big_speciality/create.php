<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\bigSpeciality */

$this->title = 'Create Big Speciality';
$this->params['breadcrumbs'][] = ['label' => 'Big Specialities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="big-speciality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
