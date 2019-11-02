<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin();  
      $user = Yii::$app->user->identity;
?>
 
<!-- Для свсех стандартно так как в таблице user храняться общие данные -->
        <div class="row d-flex text-light flex-row justify-content-center m-2 p-1">
            <div class="flk bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
                <div class="LDS bg-dark">
                    <div class="text-center">
                         <h1>Личный кабинет</h1>
                        <p>Пожалуйста, заполните следующие поля:</p>
                    </div>
                        <div class="form">
                                <?= $form->field($model, 'login')->textInput() ?>

                                <?= $form->field($model, 'e_mail')->textInput() ?>

                                <?= $form->field($model, 'password')->passwordInput() ?>

                                <?= $form->field($model, 'phone')->textInput() ?>

                                <div class="row justify-content-center">
                                     <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-light', 'name' => 'Save submit']) ?>
                                </div>
                        </div>
                </div>
            </div>
        </div>
<?php 
ActiveForm::end(); 
?>