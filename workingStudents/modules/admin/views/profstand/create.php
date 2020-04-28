<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\profstand */

$this->title = 'Create Profstand';
$this->params['breadcrumbs'][] = ['label' => 'Profstands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profstand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
