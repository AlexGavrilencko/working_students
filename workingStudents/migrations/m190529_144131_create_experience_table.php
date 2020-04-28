<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%experience}}`.
 */
class m190529_144131_create_experience_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%experience}}', [
            'id' => $this->primaryKey(),
            'resume_id' => $this->integer(),// резюме
            'years' => $this->integer(),//дата начала
            'StudyOrWork' => $this->boolean(),// флаг работа или учеба
            'nameOrganiz' => $this->string(),// организация
            'speciality_id' => $this->integer(),// специальность
            'description' => $this->text()->defaultValue(null)// описание
        ]);


        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `resume`
        


        $this->dropTable('{{%experience}}');
    }
}
