<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sertifikat}}`.
 */
class m220513_040209_create_sertifikat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sertifikat}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sertifikat}}');
    }
}
