<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%big_spaciality}}`.
 */
class m200408_105116_create_big_speciality_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%big_speciality}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(), //код укрупненной группы
            'name' => $this->string() //наименование
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%big_speciality}}');
    }
}
