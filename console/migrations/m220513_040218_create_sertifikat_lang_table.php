<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sertifikat_lang}}`.
 */
class m220513_040218_create_sertifikat_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sertifikat_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('sertifikat ni sertifikat_lang ga', 'sertifikat_lang', 'owner_id', 'sertifikat', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sertifikat_lang}}');
    }
}
