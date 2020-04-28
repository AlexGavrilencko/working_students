<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\bigSpeciality */

$this->title = 'Update Big Speciality: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Big Specialities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="big-speciality-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
