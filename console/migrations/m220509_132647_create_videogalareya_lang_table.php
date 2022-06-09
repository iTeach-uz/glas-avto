<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videogalareya_lang}}`.
 */
class m220509_132647_create_videogalareya_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videogalareya_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
        
        $this->addForeignKey('videogalareya ni videogalareya_lang ga', 'videogalareya_lang', 'owner_id', 'videogalareya', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videogalareya_lang}}');
    }
}
