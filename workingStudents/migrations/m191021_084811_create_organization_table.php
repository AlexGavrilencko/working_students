<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organization}}`.
 */
class m191021_084811_create_organization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organization}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(),//наименование
            'city_id' => $this->integer(),//город
            'adres' => $this->string(),//адрес
            'inn' => $this->string(),//инн
            'ogrn' => $this->string(),//оргн
            'image' => $this->string(),
            'correctOrg' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organization}}');
    }
}
