<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= Html::dropDownList('attributes', $selectedAttributes, $attributes, ['class'=>'form-control', 'multiple'=>true]) ?>
    <?= DetailView::widget([
        'model' => $resume,
        'attributes' => [
            'id',
            'user_id',
            'name',
            'surname',
            'patronymic',
            'city_id',
            'dateBirth',
            'image',
            'skills:ntext',
            'personalQualities_id:ntext',
            'CareerObjective_id',
            'dateAdd',
            'dateChanges',
            'ShowOrHide',
            'response',
        ],
    ]) ?>
	<div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
