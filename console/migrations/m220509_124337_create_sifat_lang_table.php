<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sifat_lang}}`.
 */
class m220509_124337_create_sifat_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sifat_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('sifat ni sifat_lang ga', 'sifat_lang', 'owner_id', 'sifat', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sifat_lang}}');
    }
}
