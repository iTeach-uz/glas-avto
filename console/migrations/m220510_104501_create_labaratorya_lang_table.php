<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%labaratorya_lang}}`.
 */
class m220510_104501_create_labaratorya_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%labaratorya_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('labaratorya ni labaratorya_lang ga', 'labaratorya_lang', 'owner_id', 'labaratorya', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%labaratorya_lang}}');
    }
}
