<?php


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

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<br>
    <div class="text-dark d-flex align-items-center justify-content-center h-100 flex-row bd-highlight flex-column">
        <div class="pole border_search padding_search">
                    <div class="text-center">
                        <h2><?= Html::encode($this->title) ?></h2>
                        <p>Вы можете составить свое резюме</p>
                    </div>
                            <div class="row justify-content-center">
                                <a href="/privateoffice/set-image" class="btn btn-rounded btngreen">Загрузите личную фотографию</a>
                            </div>

                        <br>
                        <div class="row justify-content-center">
                                <?php   
                                    $user = Yii::$app->user->identity;
                                        if($model->image): ?>
                                            <img class=" logo_user" src="/uploads/<?= $model->image?>" alt="">
                                        <?php endif; 
                                ?>
                            </div>
                        <br>

                        <?= $form->field($model, 'ShowOrHide')->radioList(array(0 => 'Показывать резюме при поиске', 1 => 'Скрывать резюме при поиске',), array('labelOptions'=>array('style'=>'display:inline'), 'separator'=>'&nbsp;&nbsp;&nbsp;</br>',)); ?>
   
                        <?= $form->field($model, 'name')->textInput() ?>

                        <?= $form->field($model, 'surname')->textInput() ?>

                        <?= $form->field($model, 'patronymic')->textInput() ?>
                        <?php
                            $user = Yii::$app->user->identity;
                            $model->user_id=$user->id;
                            // получаем все города из таблицы атрибутов
                            $city = Attributes::find()->where(['type'=>'city'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($city,'id','name');
                            $params = [
                                'prompt' => 'Укажите город'
                            ];
                            echo $form->field($model, 'city_id')->dropDownList($items,$params);
                        ?>
                        <?php
                           // echo DatePicker::widget([
                            //    'model' => $model,
                            //    'name' => 'dateBirth' ,  
                            //    'type' => DatePicker :: TYPE_COMPONENT_APPEND ,  
                            //    'value' => '' ,  
                            //    'pluginOptions' => [  
                            //        'autoclose' => true ,
                            //        'format' => 'dd-M-yyyy'  
                            //    ]
                            //]);
                         ?>
                        
                        <?php
                            // получаем все города из таблицы атрибутов
                            $qualities = Attributes::find()->where(['type'=>'qualities'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($qualities,'id','name');
                            $params = [
                                'multiple' => 'true'
                            ];
                            echo $form->field($model, 'personalQualities_id')->dropDownList($items,$params);
                        
                        ?>
                        
                        <?php
                            // получаем все города из таблицы атрибутов
                            $objective = Attributes::find()->where(['type'=>'objective'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($objective,'id','name');
                            $params = [
                                'prompt' => 'Укажите желаемую должность'
                            ];
                            echo $form->field($model, 'CareerObjective_id')->dropDownList($items,$params);
                        
                        ?>
                        <p>
                            <?= Html::a('Добавить опыт работы', ['experience_cr','res_id'=>$model->id,'or'=>'1'], ['class' => 'btn btn-success']) ?>
                            <?= Html::a('Добавить образование', ['experience_cr','res_id'=>$model->id,'or'=>'0'], ['class' => 'btn btn-success']) ?>
                        </p>
                    <?php if($model1 != null){ ?>    
                    <table>
                    <tr><td>№</td><td>Дата начала</td><td>Дата окончания</td><td>Образование\работа</td><td>Наименование организации</td><td>Специальность</td></tr>
                    <?php foreach($model1 as $exp): ?>
                        <?php  
                            $org = Organization::find()->where(['id'=>$exp->nameOrganiz_id])->one();
                            $speciality = Attributes::find()->where(['id'=>$exp->speciality_id])->one();
                            $speciality=$speciality->name;
                    
                        ?>
                        <tr>
                        <td><?=$exp->id?></td>
                        <td><?=$exp->dateStart?></td>
                        <td><?=$exp->dateEnd?></td>
                        <td><?php if($exp->StudyOrWork===0){
                            echo "Образование";
                        }else{
                            echo "Опыт работы";
                        }?></td>
                        <td><?=$org->name?></td>
                        <td><?=$speciality?></td>
                        <td><?= Html::a('Редактировать', ['experience_up', 'id' => $exp->id], ['class' => 'btn btn-primary']) ?></td>
                        <td><?= Html::a('Удалить', ['experience_del', 'id' => $exp->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы действительно хотите удалить эти данные?',
                                'method' => 'post',
                            ],
                        ]) ?></td>
                        </tr>
                    <?php endforeach;?>
                    
                    </table>
                    <?php };?>


                    <div class="row justify-content-center">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-rounded btngreen', 'name' => 'Save submit']) ?>
                    </div>
                </div>
            </div>
         </div>
<?php ActiveForm::end(); ?>
<br>