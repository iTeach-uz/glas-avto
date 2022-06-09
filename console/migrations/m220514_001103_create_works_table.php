<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%works}}`.
 */
class m220514_001103_create_works_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%works}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(255)->notNull(),
            'img' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%works}}');
    }
}
