<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_profstand}}`.
 */
class m200408_105227_create_category_profstand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_profstand}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(), //код профстандарта
            'name' => $this->string(), //наименование
            'profstand_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_profstand}}');
    }
}
