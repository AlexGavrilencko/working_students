<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%response}}`.
 */
class m200318_032753_create_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%response}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(), //пользователь
            'vacancy_id' => $this->integer(),//вакансия
            'resume_id' => $this->integer(),//резюме
            'date' => $this->date(),//дата
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%response}}');
    }
}
