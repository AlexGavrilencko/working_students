<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%spacial_profstand}}`.
 */
class m200408_105333_create_special_profstand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%special_profstand}}', [
            'id' => $this->primaryKey(),
            'categProfstand_id' => $this->integer(),
            'bigspeciality_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%special_profstand}}');
    }
}
