<?php


use app\models\Attributes;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вакансия';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
   <!-- <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
        <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="border_search padding_search">-->
    <div class="site-registration">
        <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
            <div class="pole border_search padding_search">
                <div class="form">
                    <div class="text-center">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Пожалуйста, заполните все поля:</p>
                    </div>
                    <?php   $user = Yii::$app->user->identity;
                    $model->regestr_id=$user->id; ?>
                    <p><?= $form->field($model,'regestr_id') ?></p>

                    <?= $form->field($model, 'name')->textInput() ?>

                    <?= $form->field($model, 'experience_id')->textInput() ?>

                    <?= $form->field($model, 'employment_id')->textInput() ?>

                    <?= $form->field($model, 'position_id')->textInput() ?>

                    <?= $form->field($model, 'duties')->textInput() ?>

                    <?= $form->field($model, 'requirement')->textInput() ?>

                    <?= $form->field($model, 'conditions')->textInput() ?>

                    <?= $form->field($model, 'industry_id')->textInput() ?>

                    <?= $form->field($model, 'WorkOrPractice')->textInput() ?>
                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-light', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>