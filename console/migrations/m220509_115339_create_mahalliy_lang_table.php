<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mahalliy_lang}}`.
 */
class m220509_115339_create_mahalliy_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mahalliy_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('mahalliy ni mahalliy_lang ga', 'mahalliy_lang', 'owner_id', 'mahalliy', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mahalliy_lang}}');
    }
}
