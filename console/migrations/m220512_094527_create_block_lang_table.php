<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%block_lang}}`.
 */
class m220512_094527_create_block_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%block_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('block ni block_lang ga', 'block_lang', 'owner_id', 'block', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%block_lang}}');
    }
}
