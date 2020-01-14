<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin();  
      $user = Yii::$app->user->identity;
?>
 
<!-- Для свсех стандартно так как в таблице user храняться общие данные -->
        <div class="row d-flex text-dark flex-row justify-content-center m-2 p-1">
            <div class=" bd-highlight col-sm-12 col-md-12 col-lg-12 col-xl-10">
                <div class="border_search padding_search">
                    <div class="text-center">
                         <h2>Профиль</h2>
                    </div>
                        <div class="form">
                                <?= $form->field($model, 'login')->textInput() ?>

                                <?= $form->field($model, 'e_mail')->textInput() ?>

                                <div class="group">
                                    <?= $form->field($model, 'password')->passwordInput(['class'=>'password']) ?>
                                        <label>
                                            <input type="checkbox" class="show-password"> Показать пароль
                                        </label>
                                </div>

                                <?= $form->field($model, 'phone')->textInput() ?>

                                <div class="row justify-content-center">
                                     <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen btn-lg m-3', 'name' => 'Save submit']) ?>
                                </div>
                        </div>
                </div>
            </div>
        </div>
<?php 
ActiveForm::end(); 
?>