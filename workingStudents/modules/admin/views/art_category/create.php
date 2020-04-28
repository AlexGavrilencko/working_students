<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\artCategory */

$this->title = 'Create Art Category';
$this->params['breadcrumbs'][] = ['label' => 'Art Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
