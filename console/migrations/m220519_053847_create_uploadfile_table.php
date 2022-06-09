<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%uploadfile}}`.
 */
class m220519_053847_create_uploadfile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%uploadfile}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(255)->notNull(),
            'muvofiq_id' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);

        
        $this->addForeignKey('muvofiq ni uploadfile ga', 'uploadfile', 'muvofiq_id', 'muvofiq', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%uploadfile}}');
    }
}
