<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume}}`.
 */
class m190529_144111_create_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resume}}', [
            'id' => $this->primaryKey(),//
            'user_id' => $this->integer(),//пользователь
            'name' => $this->string(),//имя
            'surname' => $this->string(),//фамилия
            'patronymic' => $this->string()->defaultValue(null),//отчество
            'city_id' => $this->integer(),//город
            'dateBirth' => $this->date()->defaultValue(null),//дата рождения
            'image' => $this->string()->defaultValue(null),//фото
            'skills' => $this->text(),//навыки
            'addinform' => $this->text(),//навыки
            'personalQualities_id' => $this->integer(),//персональные качества
            'CareerObjective_id' => $this->integer(),//желаемая должность
            'dateAdd' => $this->date(),//дата добавления
            'dateChanges' => $this->date(),//дата редактирования
            'ShowOrHide' => $this->boolean(),//показывать или скрывать
            'response' => $this->string()//отклик
        ]);


        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       


        $this->dropTable('{{%resume}}');
    }
}
