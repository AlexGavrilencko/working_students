<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%art_category}}`.
 */
class m200408_105403_create_art_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%art_category}}', [
            'id' => $this->primaryKey(),
            'title'=> $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%art_category}}');
    }
}
