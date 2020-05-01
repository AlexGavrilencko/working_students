<?php

use yii\widgets\ActiveForm;
use app\models\Attributes;
use yii\widgets\LinkPager;
use app\models\User;
use app\models\Organization;
use yii\helpers\Html;
use yii\helpers\Url;

$user = Yii::$app->user->identity;
foreach ($select as $sel):
if($vs==0){
    $this->title = 'Просмотренное';
    if($user->rang==10){ //условие для вывода просмотренного для студента
        var_dump($sel->id);
    }
    if($user->rang==20){ //условие для вывода просмотренного для работодателя
        var_dump($sel->id);
    }
}
else{
    $this->title = 'Избранное';
    if($user->rang==10){//условие для вывода избранного для студента
        var_dump($sel->id);
    }
    if($user->rang==20){ //условие для вывода избранного для работодателя
        var_dump($sel->id);
    }
}
endforeach; 
?>
          