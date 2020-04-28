<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\artCategory */

$this->title = 'Update Art Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Art Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="art-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
