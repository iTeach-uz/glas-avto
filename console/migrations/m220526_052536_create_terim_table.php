<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%terim}}`.
 */
class m220526_052536_create_terim_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%terim}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'file' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%terim}}');
    }
}
