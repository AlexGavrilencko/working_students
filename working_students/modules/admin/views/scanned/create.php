<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scanned */

$this->title = 'Create Scanned';
$this->params['breadcrumbs'][] = ['label' => 'Scanneds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scanned-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
