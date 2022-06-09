<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yoshlar}}`.
 */
class m220511_101840_create_yoshlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%yoshlar}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%yoshlar}}');
    }
}
