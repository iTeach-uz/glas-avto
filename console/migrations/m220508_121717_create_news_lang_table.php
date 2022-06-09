<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_lang}}`.
 */
class m220508_121717_create_news_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);
        
        $this->addForeignKey('news ni news_lang ga', 'news_lang', 'owner_id', 'news', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_lang}}');
    }
}
