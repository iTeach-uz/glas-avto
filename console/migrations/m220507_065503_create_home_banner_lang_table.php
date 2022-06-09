<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%home_banner_lang}}`.
 */
class m220507_065503_create_home_banner_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%home_banner_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(255)->notNUll(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        
        $this->addForeignKey('home_banner ni home_banner_lang ga', 'home_banner_lang', 'owner_id', 'home_banner', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%home_banner_lang}}');
    }
}
