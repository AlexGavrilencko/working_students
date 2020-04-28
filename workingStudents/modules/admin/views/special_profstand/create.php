<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\specialProfstand */

$this->title = 'Create Special Profstand';
$this->params['breadcrumbs'][] = ['label' => 'Special Profstands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-profstand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
