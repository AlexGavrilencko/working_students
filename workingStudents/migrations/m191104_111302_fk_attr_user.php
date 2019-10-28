<?php

use yii\db\Migration;

/**
 * Class m190604_111302_fk_attr_user
 */
class m190604_111302_fk_attr_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Связи для таблицы ВАКАНСИИ
        // creates index for column `organization_id`  VACANCY
        $this->createIndex(
            'idx-vacancy-organization_id',
            'vacancy',
            'organization_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-vacancy-organization_id',
            'vacancy',
            'organization_id',
            'organization',
            'id',
            'CASCADE'
        );
        // creates index for column `city_id` VACANCY
        $this->createIndex(
            'idx-vacancy-city_id',
            'vacancy',
            'city_id'
        );
        // add foreign key for table `city`
        $this->addForeignKey(
            'fk-vacancy-city_id',
            'vacancy',
            'city_id',
            'attributes',
            'id',
            'CASCADE'
        );
         // creates index for column `experience_id` VAKANSII
         $this->createIndex(
            'idx-vacancy-experience_id',
            'vacancy',
            'experience_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-vacancy-experience_id',
            'vacancy',
            'experience_id',
            'attributes',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`
        $this->createIndex(
            'idx-vacancy-user_id',
            'vacancy',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-vacancy-user_id',
            'vacancy',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        // creates index for column `employment_id`
        $this->createIndex(
            'idx-vacancy-employment_id',
            'vacancy',
            'employment_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-vacancy-employment_id',
            'vacancy',
            'employment_id',
            'attributes',
            'id',
            'CASCADE'
        );
         // creates index for column `schedule_id`
         $this->createIndex(
            'idx-vacancy-schedule_id',
            'vacancy',
            'schedule_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-vacancy-schedule_id',
            'vacancy',
            'schedule_id',
            'attributes',
            'id',
            'CASCADE'
        );

        // creates index for column `position_id`
        $this->createIndex(
            'idx-vacancy-position_id',
            'vacancy',
            'position_id'
        );
        // add foreign key for table `position_id`
        $this->addForeignKey(
            'fk-vacancy-position_id',
            'vacancy',
            'position_id',
            'attributes',
            'id',
            'CASCADE'
        );
        // creates index for column `category_id`
        $this->createIndex(
            'idx-vacancy-category_id',
            'vacancy',
            'category_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-vacancy-category_id',
            'vacancy',
            'category_id',
            'attributes',
            'id',
            'CASCADE'
        );






        //Связи для таблицы РЕЗЮМЕ
        // creates index for column `city_id` RESUME
        $this->createIndex(
            'idx-resume-city_id',
            'resume',
            'city_id'
        );
        // add foreign key for table `city`
        $this->addForeignKey(
            'fk-resume-city_id',
            'resume',
            'city_id',
            'attributes',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`   RESUME
        $this->createIndex(
            'idx-resume-user_id',
            'resume',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-resume-user_id',
            'resume',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        // creates index for column `CareerObjective_id`
        $this->createIndex(
            'idx-resume-CareerObjective_id',
            'resume',
            'CareerObjective_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-resume-CareerObjective_id',
            'resume',
            'CareerObjective_id',
            'attributes',
            'id',
            'CASCADE'
        );
        // creates index for column `personalQualities_id`
        $this->createIndex(
            'idx-resume-personalQualities_id',
            'resume',
            'personalQualities_id'
        );
        // add foreign key for table `attributes`
        $this->addForeignKey(
            'fk-resume-personalQualities_id',
            'resume',
            'personalQualities_id',
            'attributes',
            'id',
            'CASCADE'
        );







        //Связи для таблицы ОПЫТ
        // creates index for column `resume_id`  EXPERIENCE
        $this->createIndex(
            'idx-experience-resume_id',
            'experience',
            'resume_id'
        );
        // add foreign key for table `resume`
        $this->addForeignKey(
            'fk-experience-resume_id',
            'experience',
            'resume_id',
            'resume',
            'id',
            'CASCADE'
        );
        // creates index for column `nameOrganiz_id`  EXPERIENCE
        $this->createIndex(
            'idx-experience-nameOrganiz_id',
            'experience',
            'nameOrganiz_id'
        );
        // add foreign key for table `organization`
        $this->addForeignKey(
            'fk-experience-nameOrganiz_id',
            'experience',
            'nameOrganiz_id',
            'organization',
            'id',
            'CASCADE'
        );
        // creates index for column `speciality_id`  EXPERIENCE
        $this->createIndex(
            'idx-experience-speciality_id',
            'experience',
            'speciality_id'
        );
        // add foreign key for table `speciality`
        $this->addForeignKey(
            'fk-experience-speciality_id',
            'experience',
            'speciality_id',
            'attributes',
            'id',
            'CASCADE'
        );









        //Связи для таблицы ПРОЕКТЫ
        // creates index for column `user_id`   PROJECT
        $this->createIndex(
            'idx-project-user_id',
            'project',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-project-user_id',
            'project',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );










        //Связи для таблицы ПРОСМОТРЕННОЕ
        // creates index for column `user_id`   SCANNED
        $this->createIndex(
            'idx-scanned-user_id',
            'scanned',
            'user_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-scanned-user_id',
            'scanned',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        // creates index for column `resume_id`
        $this->createIndex(
            'idx-scanned-resume_id',
            'scanned',
            'resume_id'
        );
        // add foreign key for table `resume`
        $this->addForeignKey(
            'fk-scanned-resume_id',
            'scanned',
            'resume_id',
            'resume',
            'id',
            'CASCADE'
        );
        // creates index for column `vacancy_id`
        $this->createIndex(
            'idx-scanned-vacancy_id',
            'scanned',
            'vacancy_id'
        );
        // add foreign key for table `vacancy`
        $this->addForeignKey(
            'fk-scanned-vacancy_id',
            'scanned',
            'vacancy_id',
            'vacancy',
            'id',
            'CASCADE'
        );







        //Связи для таблицы ОРГАНИЗАЦИЯ
        // creates index for column `city_id` or organization
        $this->createIndex(
            'idx-organization-city_id',
            'organization',
            'city_id'
        );
        // add foreign key for table `city`
        $this->addForeignKey(
            'fk-organization-city_id',
            'organization',
            'city_id',
            'attributes',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190604_111302_fk_attr_user cannot be reverted.\n";

        // organization
        // drops foreign key for table `organization`
        $this->dropForeignKey(
            'fk-organization-city_id',
            'organization'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-organization-city_id',
            'organization'
        );






                                // VACANCY
        $this->dropForeignKey(
            'fk-vacancy-user_id',
            'vacancy'
        );
        // drops index for column `user_id`
        $this->dropIndex(
            'idx-vacancy-user_id',
            'vacancy'
        );
        // drops foreign key for table `organization`
        $this->dropForeignKey(
            'fk-vacancy-organization_id',
            'vacancy'
        );
        // drops index for column `organization_id`
        $this->dropIndex(
            'idx-vacancy-organization_id',
            'vacancy'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-vacancy-experience_id',
            'vacancy'
        );
        // drops index for column `experience_id`
        $this->dropIndex(
            'idx-vacancy-experience_id',
            'vacancy'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-vacancy-employment_id',
            'vacancy'
        );
        // drops index for column `employment_id`
        $this->dropIndex(
            'idx-vacancy-employment_id',
            'vacancy'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-vacancy-schedule_id',
            'vacancy'
        );
        // drops index for column `schedule_id`
        $this->dropIndex(
            'idx-vacancy-schedule_id',
            'vacancy'
        );
        // drops foreign key for table `speciality`
        $this->dropForeignKey(
            'fk-vacancy-position_id',
            'vacancy'
        );
        // drops index for column `position_id`
        $this->dropIndex(
            'idx-vacancy-position_id',
            'vacancy'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-vacancy-city_id',
            'vacancy'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-vacancy-city_id',
            'vacancy'
        );
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-vacancy-category_id',
            'vacancy'
        );
        // drops index for column `category_id`
        $this->dropIndex(
            'idx-vacancy-category_id',
            'vacancy'
        );






                    //RESUME
        // drops foreign key for table `user`  RESUME
        $this->dropForeignKey(
            'fk-resume-user_id',
            'resume'
        );
        // drops index for column `user_id`
        $this->dropIndex(
            'idx-resume-user_id',
            'resume'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-resume-city_id',
            'resume'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-resume-city_id',
            'resume'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-resume-CareerObjective_id',
            'resume'
        );
        // drops index for column `CareerObjective_id`
        $this->dropIndex(
            'idx-resume-CareerObjective_id',
            'resume'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-resume-personalQualities_id',
            'resume'
        );
        // drops index for column `personalQualities_id`
        $this->dropIndex(
            'idx-resume-personalQualities_id',
            'resume'
        );








                //  EXPERIENCE
        // drops foreign key for table `resume`   EXPERIENCE
        $this->dropForeignKey(
            'fk-experience-resume_id',
            'experience'
        );
        // drops index for column `resume_id`
        $this->dropIndex(
            'idx-experience-resume_id',
            'experience'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-experience-nameOrganiz_id',
            'experience'
        );
        // drops index for column `nameOrganiz_id`
        $this->dropIndex(
            'idx-experience-nameOrganiz_id',
            'experience'
        );
        // drops foreign key for table `attributes`
        $this->dropForeignKey(
            'fk-experience-speciality_id',
            'experience'
        );
        // drops index for column `speciality_id`
        $this->dropIndex(
            'idx-experience-speciality_id',
            'experience'
        );








            //   PROJECT
        // drops foreign key for table `user`   PROJECT
        $this->dropForeignKey(
            'fk-project-user_id',
            'project'
        );
        // drops index for column `user_id`
        $this->dropIndex(
            'idx-project-user_id',
            'project'
        );







        //  SCANNED
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-scanned-user_id',
            'scanned'
        );
        // drops index for column `user_id`
        $this->dropIndex(
            'idx-scanned-user_id',
            'scanned'
        );
        // drops foreign key for table `resume`  SCANNED
        $this->dropForeignKey(
            'fk-scanned-resume_id',
            'scanned'
        );
        // drops index for column `resume_id`
        $this->dropIndex(
            'idx-scanned-resume_id',
            'scanned'
        );
        // drops foreign key for table `vacancy`
        $this->dropForeignKey(
            'fk-scanned-vacancy_id',
            'scanned'
        );
        // drops index for column `vacancy_id`
        $this->dropIndex(
            'idx-scanned-vacancy_id',
            'scanned'
        );





        return false;
    }
     /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190604_111302_fk_attr_user cannot be reverted.\n";

        return false;
    }
    */
}
