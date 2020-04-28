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
            'code' => $this->string(), //код специальности типо 09.02.09
            'name' => $this->string(), //наименование
            'bigspecial_id' => $this->integer() // ид укрупненной группы
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
