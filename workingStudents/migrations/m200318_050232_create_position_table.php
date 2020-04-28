<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%position}}`.
 */
class m200318_050232_create_position_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey(),
            'categprofst_id' => $this->integer(), //ид категории профстандарта
            'code' => $this->string(),//код должности
            'name' => $this->string()//
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%position}}');
    }
}
