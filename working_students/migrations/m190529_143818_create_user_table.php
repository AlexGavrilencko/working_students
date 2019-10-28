<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190529_143818_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(), 
            'login' => $this->string(),// логин
            'password' => $this->string(),// пароль
            'e_mail' => $this->string(),// почта
            'phone' => $this->string(),// телефон
            'ActInactUser' => $this->boolean(),// статус пользователя
            'rang' => $this->tinyInteger()// ранг пользователя
        ]);


        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       


        $this->dropTable('{{%user}}');
    }
}
