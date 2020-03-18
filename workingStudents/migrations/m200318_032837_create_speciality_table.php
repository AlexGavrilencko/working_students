<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%speciality}}`.
 */
class m200318_032837_create_speciality_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%speciality}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(), 
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%speciality}}');
    }
}
