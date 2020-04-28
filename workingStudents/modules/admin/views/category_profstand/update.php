<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\categoryProfstand */

$this->title = 'Update Category Profstand: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Category Profstands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-profstand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
