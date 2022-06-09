<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tanlov_lang}}`.
 */
class m220513_051825_create_tanlov_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tanlov_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('tanlov ni tanlov_lang ga', 'tanlov_lang', 'owner_id', 'tanlov', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tanlov_lang}}');
    }
}
