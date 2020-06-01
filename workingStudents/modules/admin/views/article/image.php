<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<br>

<div class="site-registration text-center">
         <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="border_search31">
                <h1>Загрузка картинки</h1>
                <p>Пожалуйста, выберите изображение и сохраните его!</p>
                    <div class="article-form">

					<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

<div class="form-group">
	<?= Html::submitButton('Сохранить', ['class' => 'btn btn-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>
                    </div>
            </div>
        </div>
    </div>