<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tanlov_item_lang}}`.
 */
class m220513_053117_create_tanlov_item_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tanlov_item_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('tanlov_item ni tanlov_item_lang ga', 'tanlov_item_lang', 'owner_id', 'tanlov_item', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tanlov_item_lang}}');
    }
}
