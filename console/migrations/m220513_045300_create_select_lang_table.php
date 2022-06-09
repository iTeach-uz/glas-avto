<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%select_lang}}`.
 */
class m220513_045300_create_select_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%select_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('select ni select_lang ga', 'select_lang', 'owner_id', 'select', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%select_lang}}');
    }
}
