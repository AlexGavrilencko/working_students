<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profstand}}`.
 */
class m200408_105238_create_profstand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profstand}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(), //код профстандарта
            'name' => $this->string(), //наименование
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profstand}}');
    }
}
