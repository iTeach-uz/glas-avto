<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%afzal}}`.
 */
class m220508_043036_create_afzal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%afzal}}', [
            'id' => $this->primaryKey(),
            'icon' => $this->string(255)->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%afzal}}');
    }
}
