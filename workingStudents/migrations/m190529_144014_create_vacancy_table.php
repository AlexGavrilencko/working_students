<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy}}`.
 */
class m190529_144014_create_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancy}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),//наименование вакансии
            'user_id' => $this->integer(), //пользователь
            'organization_id' => $this->integer(), //организация - связь +, файл миграции?
            'city_id' => $this->integer(), // город - связь +, файл миграции?
            'experience_id' => $this->integer(),// опыт
            'employment_id' => $this->integer(),// тип занятости
            'schedule_id' => $this->integer(),// график работы
            'salary' => $this->integer(),//заработанная плата
            'position_id' => $this->integer(),// должность
            'duties' => $this->text(), //обязанности
            'requirement' => $this->text(), //требования
            'conditions' => $this->text(),// условия
            'category_id' => $this->integer(),// категория вакансии
            'dateAdd' => $this->date(),// дата добавления
            'dateChanges' => $this->date(),//дата изменения
            'WorkOrPractice' => $this->boolean(), //флаг практика или работа
            'ShowOrHide' => $this->boolean(), //флаг показывать или скрывать
            'description' => $this->text(),//отклик
            'viewed'=>$this->integer()
        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       

        $this->dropTable('{{%vacancy}}');
    }
}
