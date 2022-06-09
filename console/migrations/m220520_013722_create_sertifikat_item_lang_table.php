<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sertifikat_item_lang}}`.
 */
class m220520_013722_create_sertifikat_item_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sertifikat_item_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        
        $this->addForeignKey('sertifikat_item ni sertifikat_item_lang ga', 'sertifikat_item_lang', 'owner_id', 'sertifikat_item', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sertifikat_item_lang}}');
    }
}
