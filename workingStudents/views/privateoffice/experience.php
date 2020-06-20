<?php
//СТРАНИЦА Опыт и образование (составление)

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Attributes;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;	
use yii\grid\GridView;
use app\models\Organization;
use kartik\date\DatePicker;

$this->title = 'Опыт работы\Образование';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<br>
<style>

    a.disabled {
    pointer-events: none; /* делаем ссылку некликабельной */
    cursor: default;  /* устанавливаем курсор в виде стрелки */
    color: #999; /* цвет текста для нективной ссылки */
}
    .max-width-100{
        max-width: 100%;
    }
a{
        color: #00a4b9dc;
        font-size: 15px;
    }
    a:hover{
        color: #003941dc;
    }

  </style>  
    <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole border_search padding_search">
                    <div class="text-center">
                        <h2><?= Html::encode($this->title) ?></h2>
                        <p>Вы можете составить поле Опыт работы\Образование</p>
                         </div>   
   
                        <?= $form->field($model, 'dateStart')->textInput() ?>

                        <?= $form->field($model, 'dateEnd')->textInput() ?>


                        <?php
                            $org = Organization::find()->all();
                            $items = ArrayHelper::map($org,'id','name');
                            $params = [
                                'prompt' => 'Укажите организацию'
                            ];
                            echo $form->field($model, 'nameOrganiz_id')->dropDownList($items,$params);
                        
                        ?>

                        <?php
                            if($or==='0'){
                                $speciality_id = Attributes::find()->where(['type'=>'speciality'])->all();
                            } else{
                                $speciality_id = Attributes::find()->where(['type'=>'objective'])->all();
                            }
                            $items = ArrayHelper::map($speciality_id,'id','name');
                            $params = [
                                'prompt' => 'Укажите специальность'
                            ];
                            echo $form->field($model, 'speciality_id')->dropDownList($items,$params);
                        
                        ?>
                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
         </div>
<?php ActiveForm::end(); ?>
<br>