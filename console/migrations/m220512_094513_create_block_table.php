<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%block}}`.
 */
class m220512_094513_create_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%block}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%block}}');
    }
}
