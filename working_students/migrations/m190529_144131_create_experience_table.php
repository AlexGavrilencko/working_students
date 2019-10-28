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
            'dateStart' => $this->date(),//дата начала
            'dateEnd' => $this->date()->defaultValue(null),// дата окончания
            'StudyOrWork' => $this->boolean(),// флаг работа или учеба
            'nameOrganiz_id' => $this->integer(),// организация
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
