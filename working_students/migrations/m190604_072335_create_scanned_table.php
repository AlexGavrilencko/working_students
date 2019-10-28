<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scanned}}`.
 */
class m190604_072335_create_scanned_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%scanned}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(), //пользователь
            'vacancy_id' => $this->integer(),//вакансия
            'resume_id' => $this->integer(),//резюме
            'ViewOrSelect' => $this->boolean()//флаг просмотренное или избранное
        ]);


        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        


        $this->dropTable('{{%scanned}}');
    }
}
