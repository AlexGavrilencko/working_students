<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m190530_152153_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(), //пользователь
            'image' => $this->string() //фото граамот и серттификатов
        ]);


        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        


        $this->dropTable('{{%project}}');
    }
}
