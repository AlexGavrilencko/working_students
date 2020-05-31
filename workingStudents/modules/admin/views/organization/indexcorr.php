<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\Attributes;



$this->title = 'Organizations';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="response text-center" style="width: 90%">   
            <div class="table-responsive-sm table-responsive-md">
                <table class="table table-bordered table-hover table-sm mt-3">
                    <thead> 
                        <tr class="">
                            <th scope="col">id</th>
                            <th scope="col">Организация</th>
                            <th scope="col">Город</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">ИНН</th>
                            <th scope="col">ОГРН</th>
                            <th scope="col">e-mail</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead> 
                <tbody> 
                <?php
                    foreach($org as $o):
                        $u = User::find()->where(['id'=>$o->user_id])->one();
                        $a= Attributes::find()->where(['id'=>$o->city_id])->one();
                ?>
                                <tr>
                                    <th scope="row"><?=$o->id?></th> 
                                    <td><?=$o->name?></th>
                                    <td><?=$a->name?></th> 
                                    <td><?=$o->adres?></th> 
                                    <td><?=$o->inn?></th>
                                    <td><?=$o->ogrn?></th> 
                                    <td><?=$u->e_mail?></th>
                                    <td>
                                    <?= Html::a('Проверено', ['corrorg', 'id'=>$o->id], [
                                            
                                            'data' => [
                                            'confirm' => 'Организация проверена?',
                                            'method' => 'post',
                                            ],
                                        ]); ?>
                                    </th>
                                </tr>
                    <?php endforeach;?>        
                    </tbody> 
            </table>
        </div>
        </div>
