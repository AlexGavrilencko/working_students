<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>



<?php $form = ActiveForm::begin(); ?>

    <div class="row d-flex flex-row justify-content-center m-2 p-1">
        <div class=" text-light bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
            <div class="LDS bg-dark">
                <div class="text-center">
                    <h1>Личный кабинет</h1>
                    <p>Пожалуйста, заполните следующие поля:</p>
                </div>

                <div class="row justify-content-center">
                    <a href="/privateoffice/set-image" class="btn btn-outline-light m-2">Загрузите картинку</a>
                </div>

                <div class="form">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php if($model->image): ?>
                                <img class="img-fluid rounded-circle" src="/uploads/<?= $model->image?>" alt="">
                            <?php endif; ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'login')->textInput() ?>

                    <?= $form->field($model, 'e_mail')->textInput() ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'phone')->textInput() ?>

                    <?= $form->field($model, 'organization_id')->textInput() ?>

                    <?= $form->field($model, 'city_id')->textInput() ?>

                    <?= $form->field($model, 'adress')->textInput() ?>

                    <?=$form->field($model, 'description')->textarea(['rows' => 2, 'cols' => 5])->label(' О себе')?>


                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-light', 'name' => 'Save submit']) ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>