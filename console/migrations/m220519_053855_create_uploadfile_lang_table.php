<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%uploadfile_lang}}`.
 */
class m220519_053855_create_uploadfile_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%uploadfile_lang}}', [
            'id' => $this->primaryKey(),
            'language' => $this->string(255)->notNull(),
            'owner_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);

        
        $this->addForeignKey('uploadfile ni uploadfile_lang ga', 'uploadfile_lang', 'owner_id', 'uploadfile', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%uploadfile_lang}}');
    }
}
