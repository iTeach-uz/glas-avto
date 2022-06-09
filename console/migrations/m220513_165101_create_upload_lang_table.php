<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%upload_lang}}`.
 */
class m220513_165101_create_upload_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%upload_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('upload ni upload_lang ga', 'upload_lang', 'owner_id', 'upload', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%upload_lang}}');
    }
}
